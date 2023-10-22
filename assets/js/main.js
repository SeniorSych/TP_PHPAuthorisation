/* authorisation */

$('.login-btn').on('click', function (e)
{
    e.preventDefault();

    $(`input`).removeClass('errorField');

    let username = $('input[name="username"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            username: username,
            password: password
        },
        success (data) {

            if (data.status)
            {
                document.location.href = 'profile.php';
            }
            else
            {
                if (data.errorType === 1 && Array.isArray(data.fields))
                {
                    data.fields.forEach(function (field)
                    {
                        $("input[name=" + field + "]").addClass('errorField');
                        // $(`input [name="${field}"]`).addClass('errorField');
                    })
                }
                $('.msg').removeClass('none').text(data.message);
            }
        }
    })
});

/* registration */
// Avatar field

$('input[name="avatar"]').change(function (e){
    avatar = e.target.files[0];
})

$('.reg-btn').on('click', function (e)
{
    e.preventDefault();
    let avatar = false;
    $(`input`).removeClass('errorField');

    let username = $('input[name="username"]').val(),
        password = $('input[name="password"]').val(),
        name = $('input[name="name"]').val(),
        email = $('input[name="email"]').val(),
        passConfirm = $('input[name="passConfirm"]').val();

    let formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    formData.append('email', email);
    formData.append('name', name);
    formData.append('passConfirm', passConfirm);
    formData.append('avatar', avatar);

    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success(data) {
            if (data.status) {
                document.location.href = 'index.php';
            } else if (data.errorType === 3) {
                data.fields.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('errorField');
                });
                $('.msg').removeClass('none').text(data.message);
                return;
            } else if (data.errorType === 1) {
                data.fields.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('errorField');
                });
                if ($('input[name="avatar"]').val() === '') {
                    $('input[name="avatar"]').addClass('errorField');
                } else {
                    $('input[name="avatar"]').removeClass('errorField');
                }
            }
            $('.msg').removeClass('none').text(data.message);
        }
    })
});
