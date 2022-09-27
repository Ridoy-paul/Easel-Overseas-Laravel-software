jQuery(document).ready(function () { 
    jQuery("#basic-alert").on("click", function () { 
        Swal.fire({ title: "Any fool can use a computer", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
}), 
jQuery("#with-title").on("click", function () { 
    Swal.fire({ 
        title: "The Internet?,", 
        text: "That thing is still around?", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
}), 
jQuery("#footer-alert").on("click", function () { 
    Swal.fire({ 
        type: "error", 
        title: "Oops...", 
        text: "Something went wrong!", 
        footer: "<a href>Why do I have this issue?</a>", 
        confirmButtonClass: "btn btn-primary", 
        buttonsStyling: !1 
    }) 
}), 
jQuery("#html-alert").on("click", function () {
     Swal.fire({ 
         title: "<strong>HTML <u>example</u></strong>", 
         type: "info", 
         html: 'You can use <b>bold text</b> and other HTML tags',
         showCloseButton: !0, 
         showCancelButton: !0, 
         focusConfirm: !1, 
         confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!', 
         confirmButtonAriaLabel: "Thumbs up, great!", 
         cancelButtonText: '<i class="fa fa-thumbs-down"></i>', 
         cancelButtonAriaLabel: "Thumbs down", 
         confirmButtonClass: "btn btn-primary", 
         buttonsStyling: !1, 
         cancelButtonClass: "btn btn-danger ml-1" 
        }) 
    }), 
    jQuery("#position-top-start").on("click", function () { 
        Swal.fire({ 
            position: "top-start", 
            type: "success", 
            title: "Your work has been saved", 
            showConfirmButton: !1, 
            timer: 1500, 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#position-top-end").on("click", function () { 
        Swal.fire({ 
            position: "top-end", 
            type: "success", 
            title: "Your work has been saved", 
            showConfirmButton: !1, 
            timer: 1500, 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#position-bottom-start").on("click", function () { 
        Swal.fire({ 
            position: "bottom-start", 
            type: "success", 
            title: "Your work has been saved", 
            showConfirmButton: !1, 
            timer: 1500, 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#position-bottom-end").on("click", function () { 
        Swal.fire({
            position: "bottom-end", 
            type: "success", 
            title: "Your work has been saved", 
            showConfirmButton: !1, 
            timer: 1500, 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#bounce-in-animation").on("click", function () { 
        Swal.fire({ 
            title: "Bounce In Animation", 
            animation: !1, 
            customClass: "animated bounceIn", 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#fade-in-animation").on("click", function () { 
        Swal.fire({ 
            title: "Fade In Animation", 
            animation: !1, 
            customClass: "animated fadeIn", 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#flip-x-animation").on("click", function () { 
        Swal.fire({ 
            title: "Flip In Animation", 
            animation: !1, 
            customClass: "animated flipInX", 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#tada-animation").on("click", function () { 
        Swal.fire({ 
            title: "Tada Animation", 
            animation: !1, 
            customClass: "animated tada", 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#shake-animation").on("click", function () {
        Swal.fire({ 
            title: "Shake Animation", 
            animation: !1, 
            customClass: "animated shake", 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#type-success").on("click", function () { 
        Swal.fire({ 
            title: "Good job!", 
            text: "You clicked the button!", 
            type: "success",
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#type-info").on("click", function () { 
        Swal.fire({ 
            title: "Info!", 
            text: "You clicked the button!", 
            type: "info", 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#type-warning").on("click", function () { 
        Swal.fire({ 
            title: "Warning!", 
            text: " You clicked the button!", 
            type: "warning", 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#type-error").on("click", function () { 
        Swal.fire({ 
            title: "Error!", 
            text: " You clicked the button!",
            type: "error", 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#custom-icon").on("click", function () { 
        Swal.fire({ 
            title: "Sweet!", 
            text: "Modal with a custom image.", 
            imageUrl: "./assets/images/misc/bg-login.png", 
            imageWidth: 400, imageHeight: 200, 
            imageAlt: "Custom image", 
            animation: !1, 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1 
        }) 
    }), 
    jQuery("#auto-close").on("click", function () { 
        var t; 
        Swal.fire({ 
            title: "Auto close alert!", 
            html: "I will close in <strong></strong> seconds.", 
            timer: 2e3, 
            confirmButtonClass: "btn btn-primary", 
            buttonsStyling: !1, 
            onBeforeOpen: function () { 
                Swal.showLoading(), 
                t = setInterval(function () { 
                    Swal.getContent().querySelector("strong").textContent = Swal.getTimerLeft() 
                }, 100) 
            }, 
            onClose: function () { 
                clearInterval(t) 
            } 
        }).then(function (t) { t.dismiss === Swal.DismissReason.timer && console.log("I was closed by the timer") }) }), 
        jQuery("#outside-click").on("click", function () { 
            Swal.fire({ 
                title: "Click outside to close!", 
                text: "This is a cool message!", 
                allowOutsideClick: !0, 
                confirmButtonClass: "btn btn-primary", 
                buttonsStyling: !1 
            }) 
        }), 
        jQuery("#prompt-function").on("click", function () { 
            Swal.mixin({ 
                input: "text", 
                confirmButtonText: "Next &rarr;", 
                showCancelButton: !0, progressSteps: ["1", "2", "3"], 
                confirmButtonClass: "btn btn-primary", buttonsStyling: !1, 
                cancelButtonClass: "btn btn-danger ml-1" 
            }).queue([{ 
                title: "Question 1", 
                text: "Chaining swal2 modals is easy" }, "Question 2", "Question 3"]).then(function (t) {
                     t.value && Swal.fire({ title: "All done!", 
                     html: "Your answers: <pre><code>" + JSON.stringify(t.value) + "</code></pre>", 
                     confirmButtonText: "Lovely!" }) }) }), 
                jQuery("#confirm-text").on("click", function () { 
                    Swal.fire({ 
                        title: "Are you sure?", 
                        text: "You won't be able to revert this!", 
                        type: "warning", 
                        showCancelButton: !0, 
                        confirmButtonColor: "#3085d6", 
                        cancelButtonColor: "#d33", 
                        confirmButtonText: "Yes, delete it!", 
                        confirmButtonClass: "btn btn-primary", 
                        cancelButtonClass: "btn btn-danger ml-1", 
                        buttonsStyling: !1 
                    })
                    .then(function (t) { 
                        t.value && Swal.fire({ 
                            type: "success", 
                            title: "Deleted!", 
                            text: "Your file has been deleted.", 
                            confirmButtonClass: "btn btn-success" 
                        }) 
                    }) 
                }), 
                jQuery("#confirm-color").on("click", function () { 
                    Swal.fire({ 
                        title: "Are you sure?", 
                        text: "You won't be able to revert this!", 
                        type: "warning", showCancelButton: !0, 
                        confirmButtonColor: "#3085d6", 
                        cancelButtonColor: "#d33", 
                        confirmButtonText: "Yes, delete it!", 
                        confirmButtonClass: "btn btn-primary", 
                        cancelButtonClass: "btn btn-danger ml-1", 
                        buttonsStyling: !1 
                    })
                    .then(function (t) { t.value ? Swal.fire({
                         type: "success", 
                         title: "Deleted!", 
                         text: "Your file has been deleted.", 
                         confirmButtonClass: "btn btn-success" 
                        }) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({ title: "Cancelled", text: "Your imaginary file is safe :)", type: "error", confirmButtonClass: "btn btn-success" }) }) }), 
                        jQuery(".confirm-delete").on("click", function () { 
                            Swal.fire({ 
                                title: "Are you sure?", 
                                text: "You won't be able to revert this!", 
                                type: "warning", showCancelButton: !0, 
                                confirmButtonColor: "#3085d6", 
                                cancelButtonColor: "#d33", 
                                confirmButtonText: "Yes, delete it!", 
                                confirmButtonClass: "btn btn-primary", 
                                cancelButtonClass: "btn btn-danger ml-1", 
                                buttonsStyling: !1 
                            })
                            .then(function (t) { t.value ? Swal.fire({
                                 type: "success", 
                                 title: "Deleted!", 
                                 text: "Your file has been deleted.", 
                                 confirmButtonClass: "btn btn-success" 
                                }) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({ title: "Cancelled", text: "Your imaginary file is safe :)", type: "error", confirmButtonClass: "btn btn-success" }) }) })   
                    
                    });
