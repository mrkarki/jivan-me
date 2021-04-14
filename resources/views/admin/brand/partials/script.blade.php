<script>
    $(function () {
        $("#brandForm").validate({
            rules: {
                name: "required",
            },
            messages: {
                name: "Please enter category name",
            }
        });
    })
</script>
