<script>
    $(function() {
        $("#pageForm").on('click', function(){
            console.log('hello');
        });
        $("#pageForm").validate({
            rules: {
                "content[about][title]":{
                    required: true
                }
                "content[contact][title]":{
                    required: true
                }
                "content[privacy][title]":{
                    required: true
                }
            },
            messages: {
                'content[about][title]': "Page Title is required",
                'content[contact][title]': "Page Title is required",
                'content[privacy][title]': "Page Title is required",
            }
        });
        $('.summernote').summernote();

    })

</script>
