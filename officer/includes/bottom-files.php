<!-- JS Implementing Plugins -->
<script src="assets/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="assets/js/theme.min.js"></script>

<!-- Custom -->

<script>
    $(".alert").alert('close')
    </script>

<!-- JS Plugins Init. -->
<script>
  (function() {
    // INITIALIZATION OF BOOTSTRAP VALIDATION
    // =======================================================
    HSBsValidation.init('.js-validate', {
      onSubmit: data => {
        data.event.preventDefault()
        alert('Submited')
      }
    })


    // INITIALIZATION OF TOGGLE PASSWORD
    // =======================================================
    new HSTogglePassword('.js-toggle-password')
  })()
</script>
</body>

<!-- Mirrored from htmlstream.com/front/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Oct 2022 19:56:23 GMT -->
</html>