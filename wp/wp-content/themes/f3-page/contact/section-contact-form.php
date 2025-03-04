<section class="relative mt-24 text-white bg-primary">
    <div class="container items-start py-24 mx-auto max-md:flex-col-reverse">
        <div class="">
            <h2 class="mb-8">Napisz do nas</h2>
            <form id="contact-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">
                <label for="name">imie i nazwisko</label><br>
                <input class="input" placeholder="imie i nazwisko" type="text" id="name" name="name" required><br>
                <p class="hidden error-message" id="name-error">Podaj imię i nazwisko.</p>

                <label for="mail">e-mail</label><br>
                <input class="input" placeholder="e-mail" type="text" id="mail" name="mail" required><br>
                <p class="hidden error-message" id="mail-error">Podaj poprawny adres e-mail.</p>

                <label for="message">wiadomość</label><br>
                <textarea class="input" placeholder="tu wpisz swoją wiadomość" id="message"
                    name="message" required></textarea><br>

                <label>
                    <div class="flex flex-row gap-4">
                        <input type="checkbox" id="gdpr" name="gdpr" required>
                        <div>
                            Akceptuję
                            <a href="/polityka-prywatnosci">politykę prywatności</a>
                        </div>  
                    </div>
                </label>

                <p class="hidden error-message" id="gdpr-error">Musisz zaakceptować politykę prywatności.</p>
   
                <input class="float-right cursor-pointer" type="submit" value="Wyślij >">
                <p id="form-response" class="hidden"></p>

            </form>
        </div>
    </div>
</section>