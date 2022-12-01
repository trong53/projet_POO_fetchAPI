<?php include './app/Views/Blocks/header.php'; ?>

        <main>

            <div class="article">
                <img class="article_image" src="../assets/Img/<?=$data['product']['image']?>" alt="">
                <div class="article-content">
                    <div class="article-title"><?=$data['product']['name']?></div>
                    <div class="article-price"> <?=$data['product']['price']?> € </div>
                    <div class="article-cart">
                        <div class="article-quantity">
                            <img class="moins" src="../assets/Img/minus.svg" alt="">
                            <div class="quantity">1</div>
                            <img class="plus" src="../assets/Img/plus.svg" alt="">
                        </div>
                        <div class="add-cart">ADD TO CART</div>
                    </div>
                    <div class="article-description">
                        
                        <?=$data['product']['description']?>

                    </div>
                    <span class="article-id"> <?=$data['product']['id']?> </span>

                </div>
            </div>

        </main>
        
        <?php include './app/Views/Blocks/footer.php'; ?>
    </div>

<script type="module" src="http://localhost:5173/@vite/client"></script>
<script type="module" src="http://localhost:5173/assets/Js/main.js"></script>

</body>
</html>