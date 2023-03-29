<h3><?= $data['title'] ?></h3>



<form action="<?= URLROOT; ?>/reservering/topicsLesson" method="post">
    <label for="topic">PakketOptie</label><br>
    <select id="optie" name="optie">
        <option value="male">Snackpakketbasis</option>
        <option value="female">Snackpakketluxe</option>
        <option value="female">Kinderpartij</option>
        <option value="other">Vrijgezellenfeest</option>
    </select>
    <!-- <div class="topicError"> < ?= $data['topicError']; ?> </div> -->
    <br>
    <input type="hidden" name="Id" value="<?= $data['Id']; ?>"><br>
    <input type="submit" value="Wijzigen">



</form>




<label for="optie">Optiepakket :</label>

<!-- < ?= $data['rows']; ?> -->
<form action="<?= URLROOT ?>/reservering/addTopic" method="post">
    <label for="topic">PakketOptie</label><br>
    <select id="optie" name="optie">
        <option value="male">Snackpakketbasis</option>
        <option value="female">Snackpakketluxe</option>
        <option value="female">Kinderpartij</option>
        <option value="other">Vrijgezellenfeest</option>
    </select>
    <!-- <div class="topicError"> < ?= $data['topicError']; ?> </div> -->
    <br>
    <input type="hidden" name="Id" value="<?= $data['Id']; ?>"><br>
    <input type="submit" value="Wijzigen">
</form>