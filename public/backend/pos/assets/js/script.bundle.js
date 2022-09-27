
$.noConflict();
// var color_picker1 = document.getElementById("ColorPicker1").value;
// document.getElementById("ColorPicker1").onchange = function() {
//     color_picker1 = this.value;
//     document.documentElement.style.setProperty('--artical-background-primary', color_picker1);
//     document.documentElement.style.setProperty('--artical-color-primary', color_picker1);

// };

jQuery('body').on('click', function (e) {
  if (!jQuery('.dropdown.mega-dropdown').is(e.target) 
      && jQuery('.dropdown.mega-dropdown').has(e.target).length === 0 
      && jQuery('.open').has(e.target).length === 0
  ) {
    jQuery('.dropdown.mega-dropdown').removeClass('open');
    jQuery('#id2').attr('aria-expanded', 'false');
    jQuery('.calu').removeClass('show');
  }
});
"use strict";


// jQuery(window).on('load', function(){ 
  // // Animate loader off screen
  // //jQuery('.se-pre-con').fadeOut("slow");
// });

jQuery('#kt_notes_panel_toggle2').on("click", function(e){
  window.location.replace("http://localhost:3000/admin/product-units-list.html");
 
  
    // jQuery( document ).on('load' , readyFn );
    // if( window.location.href == 'http://localhost:3000/admin/product-units-list.html'){
      
    //    jQuery('#kt_notes_panel').addClass('offcanvas-on');
    // }
    // var hash= window.location.href;
   
    // if(hash === 'http://localhost:3000/admin/product-units-list.html'){
    //    jQuery('#kt_notes_panel').addClass('offcanvas-on');
    // }
//     jQuery(hash).trigger('load');
//     jQuery(hash).on('load', function(event) {
//       jQuery('#kt_notes_panel').addClass('offcanvas-on');
//   });
  });

// tabs open with click on another page
window.onload = function(){  

  var url = document.location.toString();
  if (url.match('#')) {
    jQuery('.nav-item a[href="#' + url.split('#')[1] + '"]').tab('show');
  }
  //Change hash for page-reload
  jQuery('.nav-item a[href="#' + url.split('#')[1] + '"]').on('shown', function (e) {
      window.location.hash = e.target.hash;
  }); 
}

jQuery(function() {
  let url = location.href.replace(/\/$/, "");
 
    const hash = url.split("#");
    
    jQuery('#pills-tab a[href="#'+hash[1]+'"]').tab("show");
    url = location.href.replace(/\/#/, "#");
    history.replaceState(null, null, url);
    setTimeout(() => {
      jQuery(window).scrollTop(0);
    }, 400);
   
  jQuery('a[data-toggle="pill"]').on("click", function() {
    let newUrl;
    const hash = jQuery(this).attr("href");
    console.log('check2' ,hash);
    if(hash == "#info-tab") {
      newUrl = url.split("#")[0];
    } else {
      newUrl = url.split("#")[0] + hash;
    }
    newUrl;
    history.replaceState(null, null, newUrl);
  });
});


// 2 tabs click show one tab content  

jQuery('.nav-pills li a').on('click',function (e) {     
  //get selected href
  var href = jQuery(this).attr('href');
  
  // show tab for all tabs that match href
  jQuery('.nav-pills li a[href="' + href + '"]').tab('show');
})


function checkedme() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("aftercheck");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    jQuery(text).css("display", "block");
  } else {
    jQuery(text).css("display", "none");
  }
}
function checkedme2() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck2");
  // Get the output text
  var text = document.getElementById("aftercheck2");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    jQuery(text).css("display", "block");
  } else {
    jQuery(text).css("display", "none");
  }
}

function checkedPoint() {
  // Get the checkbox
  var checkBox = document.getElementById("PhysicalRadios1");
  var checkBox2 = document.getElementById("DigitalRadio2");
  var checkBox3 = document.getElementById("InventoryRadios1");
  var checkBox4 = document.getElementById("extendRadios2");
  var checkBox5 = document.getElementById("InventoryRadio2");
  // Get the output text
  var text = document.getElementById("inventryEnter");
  var text2 = document.getElementById("DigitalEnter");
  var text3 = document.getElementById("afterinventory");
  var text4 = document.getElementById("afterinventorynext");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    jQuery(text).css("display", "block");
    jQuery(text2).css("display", "none");
    if (checkBox3.checked === true){
      console.log("xvc")
      jQuery(text3).css("display", "block");
     
      if (checkBox4.checked === true){
        console.log("xvc")
        jQuery(text4).css("display", "block");
        
      }
      else if(checkBox4.checked === false){
        jQuery(text4).css("display", "none");
     
      }
    }
    else if(checkBox5.checked === true){
      console.log("ttt")
      jQuery(text4).css("display", "none");
      jQuery(text3).css("display", "none");
    }
    
    else if(checkBox3.checked === false){
      jQuery(text3).css("display", "none");
    }
   
    
  }
  
  
  else if (checkBox2.checked == true){
    jQuery(text2).css("display", "block");
    jQuery(text).css("display", "none");
    jQuery(text3).css("display", "none");
    jQuery(text4).css("display", "none");
  }
   else  {
    jQuery(text).css("display", "none");
  }

}

  
jQuery(document).ready(function(){
  jQuery(".loadingmore").slice(0, 12).show();
  console.log( jQuery(".loadingmore").slice(0, 12).show().length);
  var getnumber = document.getElementById('numbering').innerHTML;
 console.log(getnumber);
  var totalgetnumber =jQuery(".loadingmore").length
  document.getElementById('totalnumber').innerHTML=totalgetnumber;
  console.log(totalgetnumber);
  
  jQuery("#loadMore").on("click", function(e){
  e.preventDefault();
  jQuery(".loadingmore:hidden").slice(0, 6).slideDown();
   getnumber= parseInt(getnumber)+6;
   document.getElementById("numbering").innerHTML=getnumber;
 
  if(jQuery(".loadingmore:hidden").length == 0) {
      jQuery("#loadMore").text("No Content").addClass("noContent");
  }
});

});

function printDiv2() {
  var id = jQuery('.tab-pane.show.active .table-responsive-sm').attr('id');
    console.log(id);
   
  jQuery('table').css('text-align','left');
  jQuery('table  .no-sort').css('opacity','0');
  jQuery('table .card-toolbar').css('opacity','0');
  jQuery('.dataTables_filter').css('display','none');
  jQuery('.dataTables_length').css('display','none');
  jQuery('.dataTables_info').css('display','none');
  jQuery('.dataTables_paginate').css('display','none');
 
  window.frames["print_frame"].document.body.innerHTML = document.getElementById(id).innerHTML;
  console.log(document.getElementById(id).innerHTML);

  window.frames["print_frame"].window.focus();
  window.frames["print_frame"].window.print();

  jQuery('table  .no-sort').css('opacity','1');
  jQuery('table .card-toolbar').css('opacity','1');
  jQuery('.dataTables_filter').css('display','block');
  jQuery('.dataTables_length').css('display','block');
  jQuery('.dataTables_info').css('display','block');
  jQuery('.dataTables_paginate').css('display','block');
}



function printDiv() {
  jQuery('table').css('text-align','left');
  jQuery('table  .no-sort').css('opacity','0');
  jQuery('table .card-toolbar').css('opacity','0');
  jQuery('.dataTables_filter').css('display','none');
  jQuery('.dataTables_length').css('display','none');
  jQuery('.dataTables_info').css('display','none');
  jQuery('.dataTables_paginate').css('display','none');
  window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
  window.frames["print_frame"].window.focus();
  window.frames["print_frame"].window.print();
  jQuery('table  .no-sort').css('opacity','1');
  jQuery('table .card-toolbar').css('opacity','1');
  jQuery('.dataTables_filter').css('display','block');
  jQuery('.dataTables_length').css('display','block');
  jQuery('.dataTables_info').css('display','block');
  jQuery('.dataTables_paginate').css('display','block');
}




jQuery('.cta').on('click', function(){	
    
  jQuery(this).removeClass( "active");

  jQuery(this).removeClass( "show");

  //jQuery(this).parents('.nav li a').eq(5).addClass( "active");
//jQuery(this).parents('.nav li a').addClass( "show");
});

jQuery('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
 
  var hashValue = jQuery(e.target).attr('href');

  
  jQuery("#info-tab").removeClass("active");
  jQuery("#ad-info-tab").removeClass("active");
  jQuery("#pricing-tab").removeClass("active");
  jQuery("#seo-tab").removeClass("active");
  jQuery(hashValue+"-tab").addClass("active");
  
 
  
})



///////////////// selected module
function myselect() {
  var sel = document.getElementById('slc');
  console.log('value', sel.value)
   /// show and hide div on the click by value basis
   jQuery(`#${sel.value}`).css("display", "block");

}


function mysizeSelect(){
  var selectedSize = [];
  var selectedColor = [];
  jQuery('#table-show').empty()
  for (var option of document.getElementById('sizeSelect').options) {
    if (option.selected) {
      selectedSize.push(option.value);
    }
  }
 
  for (var option of document.getElementById('selectColor').options) {
    if (option.selected) {
      selectedColor.push(option.value);
    }
  }

  combos = [] //or combos = new Array(2);
 if(selectedColor.length>=1 && selectedSize.length==0) {
  for(var j = 0; j < selectedColor.length; j++)
  {
    let obj = {
      color : selectedColor[j],
      size: ''
    }
    combos.push(obj)
 }
}
 else
  if(selectedSize.length>=1 && selectedColor.length==0){
    for(var i = 0; i < selectedSize.length ; i++)
    {
    let obj = {
      color : '',
      size: selectedSize[i],
    }
    combos.push(obj)
  }
}
 else{

  combos=[]
  for(var i = 0; i < selectedSize.length ; i++)
  {
       for(var j = 0; j < selectedColor.length; j++)
       {
          //you would access the element of the array as array1[i] and array2[j]
          //create and array with as many elements as the number of arrays you are to combine
          //add them in
          //you could have as many dimensions as you need
         
          let obj = {
            color : selectedColor[j],
            size: selectedSize[i]
          }
          combos.push(obj)
       }
  }
}
  // var sel = document.getElementById('sizeSelect');
   console.log('sizeSelect value', selectedSize)
   console.log('sizeSelect selectedColor', selectedColor)
   console.log('combos', combos)

   combos.forEach(function(elem){
    jQuery('#table-show').css('display', 'block')
    
    jQuery('#table-show').append('<tr class="row m-0 text-center"><td  class="col-2"> '+ elem.color+'</td><td class="col-2">'+ elem.size+'</td><td class="col-3 d-flex justify-content-center"><input type="text" class="form-control w-150px text-center" id="disabledInput" placeholder="'+ elem.color+ "-" +elem.size +'" disabled=""></td><td class="col-2"><img src="./assets/images/carousel/slide1.jpg" class="h-45px w-45px img-fluid" alt="img"></td><td class="col-3 d-flex justify-content-center"><input type="text" class="form-control w-150px text-center" id="disabledInput" placeholder="Credit Card" disabled=""></td></tr>')
});
}

jQuery('#remove-s').on("click", function(e){
  jQuery('#Size').css("display", "none");
});
jQuery('#remove-c').on("click", function(e){
  jQuery('#Color').css("display", "none");
});
/////////////////////////////////////////////////

jQuery('.thumbnail .detail-link').on('click', function(){	
  console.log("aa")
  jQuery(this).parent(".thumbnail").toggleClass("active");
}); 
jQuery('.selectall').on('click', function(){	
  jQuery('.thumbnail .detail-link').parent().addClass( "active");
}); 
jQuery('.unselectall').on('click', function(){	
  console.log("aa")
  jQuery('.thumbnail .detail-link').parent().removeClass( "active");
}); 
jQuery("#checkbox1").on('click', function(){	

  if(jQuery(this).is(":checked")) {
    jQuery('.changeme').html('UnSelect All');
    jQuery('.thumbnail .detail-link').parent().addClass( "active");


  } else {
    jQuery('.thumbnail .detail-link').parent().removeClass( "active");
    jQuery('.changeme').html('Select All <small class="text-muted">(1 Item Selected)</small>');
  }
  var checked = jQuery('input', this).is(':checked');
  jQuery('span', this).text(checked ? 'Off' : 'On');
  
});

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        jQuery('#imagePreview').css('background-image', 'url('+e.target.result +')');
        jQuery('#imagePreview').hide();
        jQuery('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
jQuery("#imageUpload").change(function() {
  readURL(this);
});









var $levelOneCheck = jQuery('.userPermissionCheckBox-level-one');
var $levelTwoCheck = jQuery('.userPermissionCheckBox-level-two');
var $levelThreeCheck = jQuery('.userPermissionCheckBox-level-three');

$levelOneCheck.on('click',function() {
var $isChecked = jQuery(this).attr('isChecked');
if ($isChecked === 'true') {
    jQuery(this).attr('isChecked', 'false');
    $levelTwoCheck.prop('checked', false).attr('isChecked', 'false');
    $levelThreeCheck.prop('checked', false).attr('isChecked', 'false');
} else {
    jQuery(this).attr('isChecked', 'true');
    $levelTwoCheck.prop('checked', true).attr('isChecked', 'true');
    $levelThreeCheck.prop('checked', true).attr('isChecked', 'true');
}
});

$levelTwoCheck.on('click',function() {
var $isCheckedLevelTwo = jQuery(this).attr('isChecked');
if ($isCheckedLevelTwo === 'true') {
    jQuery(this).attr('isChecked', 'false');
    jQuery(this).closest('.level-one-closed').find('.level-one-folder .userPermissionCheckBox-level-one').prop('checked', false).attr('isChecked', 'false');
    jQuery(this).closest('.level-two-closed').find('.level-three-folder .userPermissionCheckBox-level-three').prop('checked', false).attr('isChecked', 'false');
    
} else {
    jQuery(this).attr('isChecked', 'true');
    jQuery(this).closest('.level-one-closed').find('.level-one-folder .userPermissionCheckBox-level-one').prop('checked', true).attr('isChecked', 'true');
    jQuery(this).closest('.level-two-closed').find('.level-three-folder .userPermissionCheckBox-level-three').prop('checked', true).attr('isChecked', 'true');
}
});

$levelThreeCheck.on('click',function() {
var $isCheckedLevelTwo = jQuery(this).attr('isChecked');
if ($isCheckedLevelTwo === 'true') {
 
    jQuery(this).attr('isChecked', 'false');
    jQuery(this).closest('.level-one-closed').find('.level-one-folder .userPermissionCheckBox-level-one').prop('checked', false).attr('isChecked', 'false');
    jQuery(this).closest('.level-two-closed').find('.level-two-folder .userPermissionCheckBox-level-two').prop('checked', false).attr('isChecked', 'false');
    
} else {
    jQuery(this).attr('isChecked', 'true');
    jQuery(this).closest('.level-one-closed').find('.level-one-folder .userPermissionCheckBox-level-one').prop('checked', true).attr('isChecked', 'true');
    jQuery(this).closest('.level-two-closed').find('.level-two-folder .userPermissionCheckBox-level-two').prop('checked', true).attr('isChecked', 'true');
}
});

jQuery('.dropdown.mega-dropdown .topbar-item').on('click', function (event) {
  jQuery(this).parent().toggleClass('open');
   jQuery('#id2').attr('aria-expanded', 'true');
   jQuery('.calu').addClass('show');
});

jQuery(document).ready(function() {
  jQuery('#tc_aside_toggle').on("click", function(e){
      jQuery('body').toggleClass('aside-minimize');
  });
  // jQuery('#tc_aside').on("hover", function(e){
  //     jQuery('body').toggleClass('aside-minimize-hover');
  // })
  jQuery("#tc_aside").hover(function () {
      jQuery('body').toggleClass("aside-minimize-hover");
  });

  //sidebar menu active
  jQuery('#basic-input .nav-link').on("click", function(e){
    console.log('ac');
    
    jQuery('.nav-collapse').addClass('show');
  });

  //Mobile Menu
  jQuery('#tc_aside_mobile_toggle').on('click', function () {
      
      jQuery('#tc_aside').toggleClass('aside-on');
      jQuery('.aside-overlay').addClass('active');

      //put this when popup opens, to stop body scrolling
      // bodyScrollLock.disableBodyScroll(targetElement);
      // jQuery('html').css('overflow', 'hidden');
      // jQuery('body').css('overflow', 'hidden');
  });

  jQuery('.aside-overlay').on('click', function () {
      jQuery('#tc_aside').removeClass('aside-on');
      jQuery('.aside-overlay').removeClass('active');

      //put this when close popup and show scrollbar in body
      // bodyScrollLock.enableBodyScroll(targetElement);

      // jQuery('html').css('overflow', 'auto');
      // jQuery('body').css('overflow', 'auto');
  });

  // Account offCanvas
  jQuery('#tc_quick_user_toggle').on("click", function(e){
      jQuery('#kt_quick_user').addClass('offcanvas-on');
  });
  jQuery('#kt_quick_user_close').on("click", function(e){
      jQuery('#kt_quick_user').removeClass('offcanvas-on');
  });


  jQuery('#tc_header_mobile_topbar_toggle').on("click", function(e){
      jQuery('body').toggleClass('topbar-mobile-on');
  });


  jQuery('#kt_demo_panel_toggle').on("click", function(e){
      jQuery('#kt_color_panel').addClass('offcanvas-on');
  });
  jQuery('#kt_color_panel_close').on("click", function(e){
      jQuery('#kt_color_panel').removeClass('offcanvas-on');
  });

  jQuery('#kt_notes_panel_toggle').on("click", function(e){
    jQuery('#kt_notes_panel').addClass('offcanvas-on');
});
jQuery('#kt_notes_panel_close').on("click", function(e){
    jQuery('#kt_notes_panel').removeClass('offcanvas-on');
   
});

jQuery('.click-edit').on("click",function(){
  jQuery('.editpopup').addClass('offcanvas-on');
});

jQuery('.kt_notes_panel_toggle').on("click", function(e){
  jQuery('.kt_notes_panel').addClass('offcanvas-on');
});
jQuery('.kt_notes_panel_close').on("click", function(e){
  jQuery('.kt_notes_panel').removeClass('offcanvas-on');
  jQuery('.editpopup').removeClass('offcanvas-on');
});

  // theme dark
  jQuery('#radio-light').on('click', function(e){
      jQuery('#radio-dark').parent('label').removeClass('active');
      jQuery('body').removeClass('dark');
      jQuery('#radio-light').attr("checked", "checked");
      jQuery('#radio-dark').removeAttr("checked", "");
      jQuery('#radio-light').parent('label').addClass('active');

  })

  jQuery('#radio-dark').on('click', function(e){
      jQuery('#radio-light').parent('label').removeClass('active');
      jQuery('body').addClass('dark');
      jQuery('#radio-dark').attr("checked", "checked");
      jQuery('#radio-light').removeAttr("checked", "");
      jQuery('#radio-dark').parent('label').addClass('active');
  })

  
  jQuery('.btn-rtl').on('click', function(e){
    jQuery('.btn-rtl').toggleClass('active');
    jQuery('body').toggleClass('rtl');
    jQuery('#kt_color_panel').removeClass('offcanvas-on');
    
  })

  //theme color
  jQuery('#color-theme-default').on('click', function(e){
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').removeClass('color-theme-navy-blue');
    
  })
  jQuery('#color-theme-blue').on('click', function(e){
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').removeClass('color-theme-navy-blue');
    jQuery('body').addClass('color-theme-blue');
    
  })
  jQuery('#color-theme-red').on('click', function(e){
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').removeClass('color-theme-navy-blue');
    jQuery('body').addClass('color-theme-red');
  })
  jQuery('#color-theme-green').on('click', function(e){
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').removeClass('color-theme-navy-blue');
    jQuery('body').addClass('color-theme-green');
  })
  jQuery('#color-theme-yellow').on('click', function(e){
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-navy-blue');
    jQuery('body').addClass('color-theme-yellow');
  })
  jQuery('#color-theme-navy-blue').on('click', function(e){
    jQuery('body').removeClass('color-theme-blue');
    jQuery('body').removeClass('color-theme-red');
    jQuery('body').removeClass('color-theme-green');
    jQuery('body').removeClass('color-theme-yellow');
    jQuery('body').addClass('color-theme-navy-blue');
  })


  // validation for form fields

  jQuery( "#myform" ).validate({
    rules: {
      email: {
        required: true
      },
      password : {
        required: true
      }
    }
  });
  
});
jQuery(document).on('click',function() {
  var sel22 = document.getElementById('typeselect');
  console.log('value', sel22.value)
   /// show and hide div on the click by value basis
  //  var cliked = document.getElementById(sel.value);
   for ( var i = 1; i <= 7; i++){
     if(sel22.value == i){
     console.log("aya rye" ,i);
      jQuery(`#${i}`).css("display", "block");
      
     }else{

     jQuery(`#${i}`).css("display", "none");
   }
  }
  


} );

jQuery(document).ready(function() {
  var table = jQuery('#myTable').DataTable();

  jQuery('#myTable tbody').on( 'click', 'tr', function () {
      jQuery(this).toggleClass('selected');
      console.log("fsdf")
  } );

  jQuery('#button').click( function () {
      alert( table.rows('.selected').data().length +' row(s) selected' );
  } );
} );

jQuery(document).ready(function() {
  jQuery(".pin-click").click(function(e) {
    var id = jQuery(this).attr('id');
    console.log(id)
     var pin_not =    jQuery(`#${id} .pin-fixnot.dis-block`)
     var pin =    jQuery(`#${id} .pin.dis-block`)
     console.log("hdjhsj", pin_not.length)
     console.log("pin", pin.length)
    if(pin_not.length == 1){
      jQuery(`#${id} .pin-fixnot`).removeClass('dis-block');
      jQuery(`#${id} .pin-fixnot`).addClass('dis-none');
      jQuery(`#${id} .pin`).addClass("dis-block border-bottoms");
      jQuery(`#${id} .pin`).removeClass("dis-none");
     
    }

    if(pin.length == 1){
      jQuery(`#${id} .pin-fixnot`).addClass('dis-block');
      jQuery(`#${id} .pin-fixnot`).removeClass('dis-none');
      jQuery(`#${id} .pin`).removeClass("dis-block border-bottoms");
      jQuery(`#${id} .pin`).addClass("dis-none ");
    }



  });
  });

jQuery('.pin-fix').on('click', function(){
  jQuery('.pin-fix').hide();
  jQuery('.pin-fixnot').show();
  jQuery('.pincard .card-body').removeClass("border-bottoms");
});

const counters = document.querySelectorAll('.counter');
const speed = 200; // The lower the slower

counters.forEach(counter => {
	const updateCount = () => {
		const target = +counter.getAttribute('data-target');
		const count = +counter.innerText;

		// Lower inc to slow and higher to slow
		const inc = target / speed;

		// console.log(inc);
		// console.log(count);

		// Check if target is reached
		if (count < target) {
			// Add inc to count and output in counter
			counter.innerText = count + inc;
			// Call function every ms
			setTimeout(updateCount, 1);
		} else {
			counter.innerText = target;
		}
	};

	updateCount();
});




/* Get the documentElement (<html>) to display the page in fullscreen */
var elem = document.documentElement;

/* View in fullscreen */
function openFullscreen() {
    jQuery('#kt_open_fullscreen').hide();
    jQuery('#kt_close_fullscreen').show();
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) { /* Firefox */
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
      elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE/Edge */
      elem.msRequestFullscreen();
    }
    
  
    
}


/* Close fullscreen */
function closeFullscreen() {
    jQuery('#kt_close_fullscreen').hide();
    jQuery('#kt_open_fullscreen').show();
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.mozCancelFullScreen) { /* Firefox */
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) { /* IE/Edge */
      document.msExitFullscreen();
    }
  }

// Custom for pacejs
paceOptions = {
  elements: true
};
var input = document.getElementById('input'), // input/output button
  number = document.querySelectorAll('.numbers div'), // number buttons
  operator = document.querySelectorAll('.operators div'), // operator buttons
  result = document.getElementById('result'), // equal button
  clear = document.getElementById('clear'), // clear button
  resultDisplayed = false; // flag to keep an eye on what output is displayed

// adding click handlers to number buttons
for (var i = 0; i < number.length; i++) {
  number[i].addEventListener("click", function(e) {

    // storing current input string and its last character in variables - used later
    var currentString = input.innerHTML;
    var lastChar = currentString[currentString.length - 1];

    // if result is not diplayed, just keep adding
    if (resultDisplayed === false) {
      input.innerHTML += e.target.innerHTML;
    } else if (resultDisplayed === true && lastChar === "+" || lastChar === "-" || lastChar === "×" || lastChar === "÷") {
      // if result is currently displayed and user pressed an operator
      // we need to keep on adding to the string for next operation
      resultDisplayed = false;
      input.innerHTML += e.target.innerHTML;
    } else {
      // if result is currently displayed and user pressed a number
      // we need clear the input string and add the new input to start the new opration
      resultDisplayed = false;
      input.innerHTML = "";
      input.innerHTML += e.target.innerHTML;
    }

  });
}

// adding click handlers to number buttons
for (var i = 0; i < operator.length; i++) {
  operator[i].addEventListener("click", function(e) {

    // storing current input string and its last character in variables - used later
    var currentString = input.innerHTML;
    var lastChar = currentString[currentString.length - 1];

    // if last character entered is an operator, replace it with the currently pressed one
    if (lastChar === "+" || lastChar === "-" || lastChar === "×" || lastChar === "÷") {
      var newString = currentString.substring(0, currentString.length - 1) + e.target.innerHTML;
      input.innerHTML = newString;
    } else if (currentString.length == 0) {
      // if first key pressed is an opearator, don't do anything
      console.log("enter a number first");
    } else {
      // else just add the operator pressed to the input
      input.innerHTML += e.target.innerHTML;
    }

  });
}

// on click of 'equal' button
result.addEventListener("click", function() {

  // this is the string that we will be processing eg. -10+26+33-56*34/23
  var inputString = input.innerHTML;

  // forming an array of numbers. eg for above string it will be: numbers = ["10", "26", "33", "56", "34", "23"]
  var numbers = inputString.split(/\+|\-|\×|\÷/g);

  // forming an array of operators. for above string it will be: operators = ["+", "+", "-", "*", "/"]
  // first we replace all the numbers and dot with empty string and then split
  var operators = inputString.replace(/[0-9]|\./g, "").split("");

  console.log(inputString);
  console.log(operators);
  console.log(numbers);
  console.log("----------------------------");

  // now we are looping through the array and doing one operation at a time.
  // first divide, then multiply, then subtraction and then addition
  // as we move we are alterning the original numbers and operators array
  // the final element remaining in the array will be the output

  var divide = operators.indexOf("÷");
  while (divide != -1) {
    numbers.splice(divide, 2, numbers[divide] / numbers[divide + 1]);
    operators.splice(divide, 1);
    divide = operators.indexOf("÷");
  }

  var multiply = operators.indexOf("×");
  while (multiply != -1) {
    numbers.splice(multiply, 2, numbers[multiply] * numbers[multiply + 1]);
    operators.splice(multiply, 1);
    multiply = operators.indexOf("×");
  }

  var subtract = operators.indexOf("-");
  while (subtract != -1) {
    numbers.splice(subtract, 2, numbers[subtract] - numbers[subtract + 1]);
    operators.splice(subtract, 1);
    subtract = operators.indexOf("-");
  }

  var add = operators.indexOf("+");
  while (add != -1) {
    // using parseFloat is necessary, otherwise it will result in string concatenation :)
    numbers.splice(add, 2, parseFloat(numbers[add]) + parseFloat(numbers[add + 1]));
    operators.splice(add, 1);
    add = operators.indexOf("+");
  }

  input.innerHTML = numbers[0]; // displaying the output

  resultDisplayed = true; // turning flag if result is displayed
});

// clearing the input on press of clear
clear.addEventListener("click", function() {
  input.innerHTML = "";
})
jQuery(document).ready(function() {
  // Create two variables with names of months and days of the week in the array
  var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
  var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
  
  // Create an object newDate()
  var newDate = new Date();
  // Retrieve the current date from the Date object
  newDate.setDate(newDate.getDate());
  // At the output of the day, date, month and year    
  jQuery('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
  
  setInterval( function() {
      // Create an object newDate () and extract the second of the current time
      var seconds = new Date().getSeconds();
      // Add a leading zero to the value of seconds
      jQuery("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
      },1000);
      
  setInterval( function() {
      // Create an object newDate () and extract the minutes of the current time
      var minutes = new Date().getMinutes();
      // Add a leading zero to the minutes
      jQuery("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
      },1000);
      
  setInterval( function() {
      // Create an object newDate () and extract the clock from the current time
      var hours = new Date().getHours();
      // Add a leading zero to the value of hours
      jQuery("#hours").html(( hours < 10 ? "0" : "" ) + hours);
      }, 1000);
      
  }); 

// for classic Editor
ClassicEditor
.create( document.querySelector( '#editor' ),{
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ],
    alignment: {
      options: [ 'left', 'right' ]
    }
})

.catch( error => {
    console.error( error );
});

ClassicEditor
.create( document.querySelector( '#editor3' ),{
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ],
    alignment: {
      options: [ 'left', 'right' ]
    }
})

.catch( error => {
    console.error( error );
});

InlineEditor
.create( document.querySelector( '#editor2' ) )
.catch( error => {
    console.error( error );
} );

// for data tables
jQuery(document).ready( function () {
	jQuery('#myTable').DataTable();
});


(function($){
  jQuery(window).on("load",function(){
    jQuery(".my-custom-scrollbar").mCustomScrollbar(
      {
        setHeight:true
      }
    );
  });
})(jQuery);




jQuery(".nav-pills .nav-link").each(function(i){ 
  jQuery(this).click(function(e){
    jQuery(this).attr("href", jQuery('.tab-pane')[i].id);
    window.location.hash  = jQuery('.tab-pane')[i].id;
    console.log( "abc", window.location.hash);
  });
});

jQuery(".nav-pills .nav-link").click(function(e) {
  var active = this.href.slice(-5)
  , link = active.slice(1);
  console.log(active, link)
  jQuery(".tab-content [id^=tab]").hide();
  jQuery(active).show();
  history.replaceState(null, link
    , location.href.slice(-1) === "/" 
    ? location.href + "/" + link 
    : link
  )
});




