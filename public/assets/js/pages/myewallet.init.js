$(document).ready(function() {
    $('.btnwhitdraw').on('click',async function (e) {
    //  alert("Your values are :"+ $(this).data("value"));   
    //  const { value: password } = await Swal.fire({
    //     title: 'Enter your password',
    //     input: 'password',
    //     inputLabel: 'Password',
    //     inputPlaceholder: 'Enter your password',
    //     inputAttributes: {
    //       maxlength: 10,
    //       autocapitalize: 'off',
    //       autocorrect: 'off'
    //     }
    //   })
      
    //   if (password) {
    //     // Swal.fire(`Entered password: ${password}`)


    //   } 
    
    // Swal.fire({
    //     title: 'Submit your Github username',
    //     input: 'text',
    //     inputAttributes: {
    //       autocapitalize: 'off'
    //     },
    //     showCancelButton: true,
    //     confirmButtonText: 'Look up',
    //     showLoaderOnConfirm: true,
    //     preConfirm: (login) => {
    //       return fetch(`//api.github.com/users/${login}`)
    //         .then(response => {
    //           if (!response.ok) {
    //             throw new Error(response.statusText)
    //           }
    //           return response.json()
    //         })
    //         .catch(error => {
    //           Swal.showValidationMessage(
    //             `Request failed: ${error}`
    //           )
    //         })
    //     },
    //     allowOutsideClick: () => !Swal.isLoading()
    //   }).then((result) => {
    //     if (result.isConfirmed) {
    //       Swal.fire({
    //         title: `${result.value.login}'s avatar`,
    //         imageUrl: result.value.avatar_url
    //       })
    //     }
    //   })
    
    




      Swal.fire({
        title: 'Enter your password',
        input: 'password',
        // inputLabel: 'Password',
        inputPlaceholder: 'Enter your password',
        inputAttributes: {
          maxlength: 10,
          autocapitalize: 'off',
          autocorrect: 'off'
        },
        backdrop: true,
        showCancelButton: true,
        confirmButtonText: 'Whitdraw Now',
        showLoaderOnConfirm: true,
        preConfirm: (b) => {
            const a= $(this).data("value")
            // console.log(a)
        //   return fetch(`//api.github.com/users/${pass}`)
          return fetch(`./wd/${btoa(b)}/${a}`)
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText)
              }
              return response.json()
            })
            .catch(error => {
              Swal.showValidationMessage(
                // `${error}`
                'Password Wrong'
                // `Request failed: ${error}`
              )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        console.log(result)
        if (result.isConfirmed) {
            const a= result.value.shop
            Swal.fire({
                title: '<p>E-Wallet <strong>'+result.value.shopdesc+'</strong></p>'+
                        '<u class="badge bg-soft-success text-success fw-bolder" style="font-size: 35px;">Rp '+result.value.ewal+'</u>',
                html: "<strong>Are you sure withdraw E-Wallet?</strong>",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Withdraw Now!'
            }).then((result) => {
                if (result.isConfirmed) {
                    toastr.options = {
                        "closeButton": true,
                        "debug": true,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "3000",
                        "timeOut": "3000",
                        "extendedTimeOut": "3000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp"
                    }
                    $.ajax({
                        type: "GET",
                        url: "./wdnow/"+btoa(a),
                        dataType: "JSON",
                        success: function(result) {
                            console.log(result)
                            Swal.fire(
                                        'Success',
                                        'Your E-Wallet Successfully Withdrawn.!',
                                        'success'
                                    )
                            notifLaunch('success', 'Your E-Wallet Successfully Withdrawn.!');
                            checkNotif();
                            // $('"#'+result.id+'"').html(result.value)
                            document.getElementById(result.id).innerHTML = result.value;
                        },
                        error: function(result) {
                            console.log(result)
                            Swal.fire(
                                        'Failed',
                                        'Your E-Wallet Failed Withdrawn.!',
                                        'error'
                                    )
                            notifLaunch('error', 'Your E-Wallet Failed Withdrawn.!');
                            checkNotif();
                        }
                    })

                }
            })
        }
      })
        


    });   
});