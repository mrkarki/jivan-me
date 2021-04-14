<script>
    $(function () {
        $("#produtForm").validate({
            rules: {
                title: "required",
                category_id: "required",
                regular_price: "required",

            },
            messages: {
                title: "Please enter product name",
                category_id: "Please select category",
                regular_price: "Please add regular price",
            }
        });
        $('.summernote').summernote();
        $('.remove-image').on('click', function(){
            $(this).prev().remove();
            $(this).remove();
            $('.upload-image').show();
        });
    })

</script>
