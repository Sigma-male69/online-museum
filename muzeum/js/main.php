<script>
    $(document).ready(function() {
        get_content();
    })

    function get_content() {
        $.ajax({
            type: "POST",
            url: "./includes/get-content.php",
            data: {},
            dataType: 'json',
            success: function(data) {
                $('#content').html(data['html']);
            }
        })

    }

    function del(id) {
        console.log('hey')
        console.log(id)
        $.ajax({
            type: "POST",
            url: "./includes/delete-QR.php",
            data: {
                id
            },
            dataType: 'json',
            success: function() {
                get_content()
            }
        })

    }

    function duplicate(title, era, image, content) {
        $.ajax({
            type: "POST",
            url: "./includes/edit-QR.php",
            data: {
                title,
                era,
                image,
                content
            },
            dataType: 'json',
            success: function() {
                get_content()

            }
        })


    }

    function change(id) {
        $.ajax({
            type: "GET",
            url: "./edit-QR-code.php",
            data: {
                id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data)
            }
        })
    }

    function save() {
        let titel = $('#titel').val()
        let editor = $('#editor').val()
        let tijdperk = $('#tijdperk').val()
        let foto = $('#foto').val()
        let id = $('#id').val()

        console.log(id)
        console.log(titel)
        console.log(editor)
        console.log(tijdperk)
        console.log(foto)

        $.ajax({
            url: './includes/change-QR.php',
            method: 'POST',
            data: {
                id,
                titel,
                editor,
                tijdperk,
                foto
            },
            success: function() {
                console.log('success')
                window.location.href = 'admin.php'
            }
        })
    }

    function login() {
        const username = $('#username').val()
        const password = $('#password').val()

        $.ajax({
            url: './includes/login.php',
            method: 'POST',
            data: {
                username,
                password,
            },
            dataType: 'json',
            success: function(data) {
                console.log(data)
                if (data['user'] == true) {
                    alert('U bent ingelogd.')
                    window.location.href = 'admin.php'
                } else {
                    alert('Wachtwoord of gebruikersnaam is fout.')
                }


            }
        });

    }
</script>