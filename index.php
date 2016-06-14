<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Todo-Liste-Sinplonien</title>
    <?php
    include('Config.php');
    $categories = $db->query('SELECT * FROM categorie');
    ?>
</head>
<style>
    html {
        background-color: black;
    }

    .titre {
        text-align: center;
        color: fuchsia;
        font-size: 46px;
    }

    .tout {
        margin-left: 7%;
    }

    .invisible {
        display: none;
    }

    .ajout {
        background-color: blue;
        margin-left: 3%;
        border-radius: 2%;
        float: left;
        border: dashed 1px white;
        width: 29%;
        height: 90vh;
    }

    .liste {
        background-color: chocolate;
        margin-left: 3%;
        border-radius: 2%;
        float: left;
        border: dashed 1px white;
        width: 29%;
        height: 90vh;
        overflow-y: scroll;
    }

    .list_cat {
        background-color: #128b08;
        margin-left: 3%;
        sport border-radius: 2%;
        height: 90vh;
        border: dashed 1px white;
        width: 29%;
        float: left;
    }

    .post {
        transform: rotate(-10deg);
        width: 310px;
        height: 288px;
        margin: auto;
        background: url("img_1.png") no-repeat -30%;
        list-style-type: none;
    }

    li {
        list-style-type: none;
    }

    .categorie {
        text-decoration: none;
        width: 100%;
        margin: auto;
        color: black;
        text-transform: uppercase;
    }

    h4 {
        font-size: larger;
        text-align: center;
        margin-top: 5%;
    }

    .descrp {
        color: darkgray;
        text-transform: full-size-kana;
    }

    .buton {
        margin: 9%;
        float: left;
        color: black;
        background-color: darkorange;
        border: solid 2px orange;
        text-decoration: none;
    }

    .buton:active {
        color: white;
        background-color: mediumorchid;
        border: solid 2px yellowgreen;
    }
</style>
<body>
<div class="tout">
    <h1 class="titre">ZE Todo-Liste</h1>
    <section class="list_cat">
        <?php
        $listcate = $db->query('SELECT * FROM categorie');
        ?>
        <ul>
            <a href="index.php?listcategorie=">Tout</a>
            <?php while ($listcates = $listcate->fetch_array()) { ?>
                <li>
                    <a class="categorie" href="index.php?listcategorie=<?= $listcates['categorie'] ?>">
                        <?php echo $listcates['categorie']; ?></a>
                </li>

                <?php
            } ?>
        </ul>
            <h4>Ajout Categorie</h4>
            <form method="post" action="traitementcat.php">
                <input type="text" name="nomcat"><br>
                <input type="submit" value="Ajouter">
            </form>
    </section>
    <section class="liste">
        <?php
        $listcategorie = $_GET['listcategorie'];
        if (empty($listcategorie)) {
            $listtache = $db->query('SELECT * FROM tache ORDER BY date_fin');
        } else {
            $listtache = $db->query('SELECT * FROM tache WHERE categories = "' . $listcategorie . '"ORDER BY date_fin ');
        }
        ?>
        <ul>
            <?php while ($listtaches = $listtache->fetch_array()) { ?>
                <li class="post" onclick="gwen('<?= $listtaches['titre'] ?>')">
                    <h4><?php echo $listtaches['titre']; ?></h4>
                    <?php echo $listtaches['tache']; ?><br>
                    Date debut: <?php echo $listtaches['date_debut']; ?> <br>
                    Ce termine: <?php echo $listtaches['date_fin']; ?><br>
                    Categorie: <?= $listtaches['categories'] ?><br><br>
                    <div id="<?= $listtaches['titre'] ?>"
                         class="invisible descrp"><?= $listtaches['description'] ?></div>
                    <a class="buton"
                       href="index.php?page=editer&id=<?= $listtaches['cle_tache'] ?>&titre=<?php echo $listtaches['titre']; ?>&tache=<?php echo $listtaches['tache']; ?>">
                        Edit me
                    </a>
                    <form method="post" action="traitementsupr.php">
                        <button class="buton" type="submit" value="<?= $listtaches['cle_tache'] ?>" name="supression">
                            Finish me
                        </button>
                    </form>
                    <br><br>
                </li>
                </ul>
            <?php } ?>
        </ul>
    </section>
    <section class="ajout">
        <h4>Ajout Tache</h4>
        <form method="post" action="traitement.php">
            <input type="text" name="Titre"><br>
            <input type="text" name="Tache"><br>
            <select name="categorie">
                <?php while ($categorie = $categories->fetch_array()) { ?>
                    <option value="<?php echo $categorie['categorie']; ?>"><?= $categorie['categorie'] ?></option>
                <?php } ?>
            </select><br>
            <input type="date" name="Date_de_fin" min="<?= date("Y-m-d"); ?>"><br>
            <input type="submit" value="Envoyer">
        </form>
        <?php
        $page = $_GET['page'];
        switch ($page) {
            case 'editer':
                include('editer.php');
                break;
        }
        ?>
    </section>
    <script type="text/javascript">
        function gwen(test) {
            var div = document.getElementById(test);
            div.classList.toggle("invisible");
        }
    </script>
</div>
</body>
</html>