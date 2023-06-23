<?php include"header.php"
?>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <div class='wrapper'>
        <div class='all_msg'>

            <section class='content'>
                <header>
                    <h2>Pseudo</h2>
                </header>

                <div class="body">
					<article class="message is-receiver">
						<p>message 1</p>
					</article>
					<article class="message is-sender">
						<p>message 2</p>
					</article>
				</div>

				<form>
					<input type="text" />
					<button class="submit" type="submit" title="envoyer">
						<img src="img/" alt="">
					</button>
				</form>

            </section>
        </div>
    </div>

<?php include"footer.php"
?>

<style>


.all_msg header {
    padding:30px;
    background:#222221;
}
header h2{
	font-weight: bold;
    font-family: 'Poppins';
    font-size: 30px;
    color: white;
}

.body {
	display: flex;
	flex-direction: column;
	overflow: auto;
	height: 100%;
	background: #F5F5F5;
	padding: 20px;
}

.message {
	display: flex;
	padding: 20px;
}

.message p {
	font-size: 20px;
	color: black;
	font-weight:bold;
	box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}

.message.is-sender {
	justify-content: flex-end;
}

.message.is-sender p {
	padding: 20px;
	background: #222221;
	border-radius: 15px;
    color: white ;
    font-family: 'Poppins';
}

.message.is-receiver {
	justify-content: flex-start;
}

.message.is-receiver p {
	padding: 20px;
	background: white;
	border-radius: 15px;
    font-family: 'Poppins';
}

.content {
	border-radius: 30px;
	overflow: hidden;
}

.content form {
	flex: none;
	display: flex;
	align-items: center;
	height: 70px;
	padding: 12px 40px;
	background: #222221;
}

.content input {
	height: 100%;
	width: 100%;
	padding: 20px;
	border-radius: 30px;
	outline: none;
	border: 0;
	font-size: 20px;
}

.content form button {
	flex: none;
	border: 0;
	color: #54656f;
	margin-left: 12px;
	width: 46px;
	height: 46px;
	background-color: transparent;
	cursor: pointer;
}

.content button svg {
	width: 20px;
}

.content .submit {
    background: none;

	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;

    margin-right: 2%;
}

</style>

<script>
    var $sub = document.querySelector('form .submit');
    var $input = document.querySelector('form input');
    var $body = document.querySelector('.body');
    var $msg = document.querySelector('.body .message.is-sender	');
    var $p = document.querySelector('.message p');

   

    $sub.addEventListener('click', function (event) {
        event.preventDefault();
        var newMessage = document.createElement('article');
        var p = document.createElement('p');
        p.textContent = $input.value;
        newMessage.appendChild(p);
        newMessage.classList.add('message');
        newMessage.classList.add('is-sender');
        $body.appendChild(newMessage);

	    $input.value = '';
    });
</script>
