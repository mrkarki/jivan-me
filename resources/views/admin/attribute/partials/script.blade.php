<script>
    $(function () {
        $("#attributeForm").validate({
            rules: {
                title: "required",
            },
            messages: {
                title: "Please enter name",
            }
        });
    })
</script>
