<?php //var_dump($data['row']); 
?>

<h2 style="position:relative; left:650px; padding: 25px 0px 50px 0px;"><?= $data['title']; ?></h2>
<div class="container col-4">
    <div class="row">

        <form style="position:relative; left:650px; padding: 25px 0px 50px 0px;" id="update" action="<?= URLROOT; ?>/reservering/update" method="POST">
            <div class="mb-3">
                <label for="Naam" class="form-label">PakketOptie :</label>
                <select id="Naam" name="Naam">
                    <option value="Snackpakketbasis" <?php if ($data['row']->Naam == 'Snackpakketbasis') {
                                                            echo 'Selected';
                                                        } ?>>Snackpakketbasis</option>
                    <option value="Snackpakketluxe" <?php if ($data['row']->Naam == 'Snackpakketluxe') {
                                                        echo 'Selected';
                                                    } ?>>Snackpakketluxe</option>
                    <option value="Kinderpartij" <?php if ($data['row']->Naam == 'Kinderpartij') {
                                                        echo 'Selected';
                                                    } ?>>Kinderpartij</option>
                    <option value="Vrijgezellenfeest" <?php if ($data['row']->Naam == 'Vrijgezellenfeest') {
                                                            echo 'Selected';
                                                        } ?>>Vrijgezellenfeest</option>
                </select>
            </div>
            <input type="hidden" name="AantalKinderen" value="<?= $data['row']->AantalKinderen; ?>">
            <div class="mb-3">
                <input type="hidden" name="Id" value="<?= $data["row"]->Id; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Wijzigen</button>
        </form>
    </div>
</div>