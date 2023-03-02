  //secound menu filter 

    $("#allProduct").click(function() {


        $(".laptop").show();
        $(".mobilePhone").show();
    });
    $("#laptop").click(function() {

        $(".laptop").show();      
        $(".mobilePhone").hide();      
    });
    $("#mobilePhone").click(function() {

        $(".mobilePhone").show();      
        $(".laptop").hide();      
    });



// product details page 

    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }


    // add Product page

    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result);
            $('#image-preview').hide();
            $('#image-preview').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#file-input").change(function() {
        readURL(this);
      });
          function readURL1(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#image-preview1').attr('src', e.target.result);
            $('#image-preview1').hide();
            $('#image-preview1').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#file-input1").change(function() {
        readURL1(this);
      });
          function readURL2(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#image-preview2').attr('src', e.target.result);
            $('#image-preview2').hide();
            $('#image-preview2').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#file-input2").change(function() {
        readURL2(this);
      });
          function readURL3(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#image-preview3').attr('src', e.target.result);
            $('#image-preview3').hide();
            $('#image-preview3').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#file-input3").change(function() {
        readURL3(this);
      });
          function readURL4(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#image-preview4').attr('src', e.target.result);
            $('#image-preview4').hide();
            $('#image-preview4').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#file-input4").change(function() {
        readURL4(this);
      });

// profile page 

function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to delete")) {
     document.location = delUrl;
    }
  }



