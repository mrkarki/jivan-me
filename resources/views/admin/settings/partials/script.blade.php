<script>
    $(function () {
        $("#categoryForm").validate({
            rules: {
                name: "required",
            },
            messages: {
                name: "Please enter category name",
            }
        });
    })
</script>
