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
        showCancelButton: true,
        confirmButtonText: 'Whitdraw Now',
        showLoaderOnConfirm: true,
        preConfirm: (pass) => {
        //   return fetch(`//api.github.com/users/${pass}`)
          return fetch(`./wdnow/${pass}`)
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText)
              }
              return response.json()
            })
            .catch(error => {
              Swal.showValidationMessage(
                `${error}`
                // `Request failed: ${error}`
              )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        if (result.isConfirmed) {
        //   Swal.fire({
        //     title: `${result.value.pass}'s avatar`,
        //     // imageUrl: result.value.avatar_url
        //   })

        Swal.fire({
            title: 'Are you sure?',
            html: "Do you want to Whitdraw ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
        })
        }
      })
      
      


    });   
});