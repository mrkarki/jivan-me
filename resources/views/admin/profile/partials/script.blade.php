<script>
    $(function() {
        $("#userForm").validate({
            rules: {
                name: "required",
            },
            messages: {
                name: "Please enter user name",
            }
        });
    });

    $('.user-role-2 #non-normal, .user-role-3 #non-normal').show();
    var role = $('select#user-role').val();
    if (role == 2 || role == 3) {
        $('#non-normal').show();
    } else {
        $('#non-normal').hide();
    }
    $('select#user-role').on('change', function() {
        if ($(this).val() == 2 || $(this).val() == 3) {
            $('#non-normal').show();
        } else {
            $('#non-normal').hide();
        }

    });

</script>
