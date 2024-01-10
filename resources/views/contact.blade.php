<!DOCTYPE html>
<html lang="en">
<x-layout>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form>
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Contact</h3>

    </div>
    <div class="form">
        <div class="label">
            <label><strong>Nom : </strong></label>
            <input type="text" name="nom" id="nom">
        </div>
        <div class="label">
            <label><strong>Prénom : </strong></label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div class="label">
            <label><strong>Adresse Mail : </strong></label>
            <input type="email" name="mail" id="mail">
        </div>
        <div class="label">
            <i class='bx bx-pencil' ></i>
            <textarea name="zonetexte" id="zonetexte" rows="6" class="form-input"
                      placeholder="Écrivez votre message"></textarea>
        </div>

        <div>
            <button class="valid" type="submit">Valide</button>
        </div>
    </div>
</form>
</body>
</x-layout>
</html>
