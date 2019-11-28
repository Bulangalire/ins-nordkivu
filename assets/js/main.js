// Cette méthode permet de retarde le demarrage du chargement

function debounce(callback, delay){

	let timer;

	return function(){

		let args = arguments;

		let context = this;

		clearTimeout(timer);

		timer= setTimeout(function(){

			callback.apply(context, args);

		}, delay)

	}

}





class linkedSelect{



	/**

	 *

	 * @param {HTMLSelectElement} $select

	 */

	constructor($select){

		this.$select=$select;

		this.$target= document.querySelector(this.$select.dataset.target)

		this.$placeholder=this.$target.firstElementChild

		this.$loader=null

		this.onChange = debounce(this.onChange.bind(this), 500)

		this.cash={



		}

		this.$select.addEventListener('change', this.onChange)

	}



	/**

	 * Se declenche au changement de l'element du select

	 * @param {Event} e

	 */

	onChange(e){

		this.loadeOptions(e.target.value, (options)=>{

				 this.$target.innerHTML=options

				 this.$target.insertBefore(this.$placeholder, this.$target.firstChild)

				 this.$target.selectedIndex=0

				 this.$target.style.display=null



		})

	}



	/**

	 *

	 * @param {String} id

	 * @param {function} callback

	 */

	loadeOptions(id, callback){

		if(this.cash[id]){

			callback(this.cash[id])

			return

		}

		this.showloader()

		// On récupere les données en ajax

		let request = new XMLHttpRequest();

		request.open('GET',this.$select.dataset.source.replace('$id', id), true)

		request.onload=()=>{

			if(request.status >= 200  &&  request.status < 400){

				let data =JSON.parse(request.responseText)

				 let options = data.reduce(function(accumulateur, option){



					return accumulateur+ '<option value="'+ option.value+ '">'+ option.label + '</option>'



				 }, "")

				 this.cash[id]=options

				 callback(options)

				 this.hideloader()

			}else{

				alert("Impossible de charger la liste")

			}

		}

		request.onerror=function(){

			alert('impossible de charger la liste')

		}

		request.send()

		// On injecte les données dans le prochain select





	}

	showloader(){

		this.$loader = document.createTextNode('Chargement en cours .....')

		this.$target.parentNode.appendChild(this.$loader)

	}

	hideloader(){

		if(this.$loader!==null){

		this.$loader.parentNode.removeChild(this.$loader)

		this.$loader=null

		}

	}

}





let $selects= document.querySelectorAll('.linked-select')

$selects.forEach(function($select){

	new linkedSelect($select)

})



$(document).ready(function(){

	$('#avenue').change(function(){



		var avenue_id= $(this).val();

		$.ajax({

			url:"filltableEnfant.php",

			method:'POST',

			data:{avenue_id:avenue_id},

			success:function(data){

				$('#tblvulnerableEnfant').html(data);

			}



		});



		$.ajax({

			url:"filltableAdulte.php",

			method:'POST',

			data:{avenue_id:avenue_id},

			success:function(data){

				$('#tblvulnerableAdulte').html(data);

			}



		});



		$.ajax({

			url:"filltableMobiliteReduite.php",

			method:'POST',

			data:{avenue_id:avenue_id},

			success:function(data){

				$('#tblvulnerableMolitereduite').html(data);

			}



		});



		$.ajax({

			url:"filltableMaladeChronique.php",

			method:'POST',

			data:{avenue_id:avenue_id},

			success:function(data){

				$('#tblvulnerableMaladieChronique').html(data);

			}



		});





	})

});





$(document).ready(function(){

	$('#cellule').change(function(){

		var avenue_id= $(this).val();



	$.ajax({

			url:"fillAvenue.php",

			method:'POST',

			data:{avenue_id:avenue_id},

			success:function(data){

				$('#avenuemap').html(data);

			}



		});



	});

});

$(document).ready(function(){
	$('#mois_concerne').change(function(){
		var mois= $(this).val();
	
		$.ajax({

		url:"evolution_indice_prix.php",
		method:'POST',
		data:{mois:mois},
		success:function(data){
			$('#tblvariayionprix').html(data);
			}
		});
	});
});






let modalId = $('#image-gallery');



$(document)

  .ready(function () {



    loadGallery(true, 'a.thumbnail');



    //This function disables buttons when needed

    function disableButtons(counter_max, counter_current) {

      $('#show-previous-image, #show-next-image')

        .show();

      if (counter_max === counter_current) {

        $('#show-next-image')

          .hide();

      } else if (counter_current === 1) {

        $('#show-previous-image')

          .hide();

      }

    }



    /**

     *

     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.

     * @param setClickAttr  Sets the attribute for the click handler.

     */



    function loadGallery(setIDs, setClickAttr) {

      let current_image,

        selector,

        counter = 0;



      $('#show-next-image, #show-previous-image')

        .click(function () {

          if ($(this)

            .attr('id') === 'show-previous-image') {

            current_image--;

          } else {

            current_image++;

          }



          selector = $('[data-image-id="' + current_image + '"]');

          updateGallery(selector);

        });



      function updateGallery(selector) {

        let $sel = selector;

        current_image = $sel.data('image-id');

        $('#image-gallery-title')

          .text($sel.data('title'));

        $('#image-gallery-image')

          .attr('src', $sel.data('image'));

        disableButtons(counter, $sel.data('image-id'));

      }



      if (setIDs == true) {

        $('[data-image-id]')

          .each(function () {

            counter++;

            $(this)

              .attr('data-image-id', counter);

          });

      }

      $(setClickAttr)

        .on('click', function () {

          updateGallery($(this));

        });

    }

  });



// build key actions

$(document)

  .keydown(function (e) {

    switch (e.which) {

      case 37: // left

        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {

          $('#show-previous-image')

            .click();

        }

        break;



      case 39: // right

        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {

          $('#show-next-image')

            .click();

        }

        break;



      default:

        return; // exit this handler for other keys

    }

    e.preventDefault(); // prevent the default action (scroll / move caret)

  });



//Filter Button



$(document).ready(function(){



  $(".filter-button").click(function(){

      var value = $(this).attr('data-filter');



      if(value == "todo")

      {

          //$('.filter').removeClass('hidden');

          $('.filter').show('1000');

      }

      else

      {

//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');

//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');

          $(".filter").not('.'+value).hide('3000');

          $('.filter').filter('.'+value).show('3000');



      }

  });



});





$(document).ready(function(){

let $map = document.querySelector('#avenueMaps')

class leafletMap{



	constructor(){

		this.map=null

		this.bounds=[]

	}

	async load(element){

		return new Promise((resolve, reject)=>{

			$script('https://unpkg.com/leaflet@1.4.0/dist/leaflet.js', () =>{

				this.map=L.map(element)

				L.tileLayer('//{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {

				attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',

				maxZoom: 24,

		}).addTo(this.map)

		resolve()

			 })

		})



	}

		 addMarker(lat, lng, population, avenue){

			 let point =[lat,lng]

			 this.bounds.push(point)

			 return new LefleatMarker(point, population, avenue, this.map)

		 }

		 center(){

			 this.map.fitBounds(this.bounds)

		 }

	 }



class LefleatMarker{

	constructor(point, population, avenue, map){

		this.popup= L.popup({

			autoClose:false,

			closeOnEscapeKey:false,

			closeOnClick:false,

			closeButton:false,

			className:'marker',

			maxWidth:200

		})

	.setLatLng(point)

	.setContent( avenue +"<br /> "+ population)

	.openOn(map)

	}

	setActive(){

		this.popup.getElement().classList.add("is-active")

	}

	unsetActive(){

		this.popup.getElement().classList.remove("is-active")

	}

}

const initMap = async function(){

let map = new leafletMap()

let hoverMarker = null

await map.load($map)

Array.from(document.querySelectorAll('.js-marker')).forEach((item)=>{

	let marker = map.addMarker(item.dataset.lat, item.dataset.lng, item.dataset.population , item.dataset.avenue)

item.addEventListener('mouseOver', function(){

	if(overMarker!=null){

		hoverMarker.unsetActive()

	}

marker.setActive()

hoverMarker = marker

})

})

map.center()

}

if($map !== null){

	initMap()

}



});

$(document).ready(function(){

const url ="/ins-nordkivu/assets/doc/LANCEMENT_RGE_GOMA_Aout_2019.pdf";

let pdfDoc= null,
pageNum = 1,
pageIsRendering= false,
pageNumIsPending =null;

const scale= 1,
        canvas=document.querySelector('#pdf-render'),
        ctx = canvas.getContext('2d');
		
		// Render the page
const renderPage= num =>{
	pageIsRendering=true;

	//Get page
	pdfDoc.getPage(num).then(page =>{
		
	// Set scale
    const viewport = page.getViewport({scale});
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    const renderCtx ={
        canvasContext:ctx,
        viewport
    }
	
    page.render(renderCtx).promise.then(()=>{
        pageIsRendering = false;
		
        if(pageNumIsPending !==null){
            renderPage(pageNumIsPending);
            pageNumIsPending = null;
        }
    });
	// output current page
	document.querySelector('#page-num').textContent= num;
	
});
}
// Check for pages rendering
const queueRenderPage= num => {
	if(pageIsRendering){
		pageNumIsPending= num;
	}else{
		renderPage(num);
	}
}

// Show Prev page 
const showPrevPage=() =>{
	
	if(pageNum<=1){
		return;
	}else{
		pageNum--;
		queueRenderPage(pageNum);
	}
		
}

// Show Next page 
const showNexPage=() =>{
	
	if(pageNum>=pdfDoc.numPages){
		return;
	}else{
		pageNum++;
		queueRenderPage(pageNum);
	}
		
}



// Get document
pdfjsLib.getDocument(url).promise.then(pdfDoc_ =>{
    pdfDoc =pdfDoc_ ;
     
    document.querySelector('#page-count').textContent= pdfDoc.numPages;
    renderPage(pageNum);
})
.catch(err => {
	// display error
	const div = document.createElement('div');
	div.className='error';
	div.appendChild(document.createTextNode(err.message));
	document.querySelector('body').insertBefore(div, canvas);
	
	// remove top bar
	document.querySelector('.top-bar').style.display='none'; 
}
	);

// Button events

document.querySelector('#prev-page').addEventListener('click', showPrevPage);
document.querySelector('#next-page').addEventListener('click', showNexPage);
});