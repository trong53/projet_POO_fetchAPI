<?php include './app/Views/Blocks/header.php'; ?>

        <section id="filter-section">
            <img id="filter-icon" src="../assets/Img/filter.svg" alt="">
            <form method="GET">
                <select name="filter" id="filter">
                    <option value="all" <?=($data['filter']=='all')?'selected':''?>             >All</option>
                    <option value="female" <?=($data['filter']=='female')?'selected':''?>       >Perfumes for HER</option>
                    <option value="male" <?=($data['filter']=='male')?'selected':''?>           >Perfumes for HIM</option>
                    <option value="price_ins" <?=($data['filter']=='price_ins')?'selected':''?> >Price &uarr;</option>
                    <option value="price_des" <?=($data['filter']=='price_des')?'selected':''?> >Price &darr;</option>
                </select>
            </form>
        </section>

        <main>
            <div class="perfumes">
                <?php
                    foreach($data['product'] as $item) { ?>
                        <a class="perfume" href="/article?id=<?=$item['id']?>">
                            <img class="Perfume_Image" src="../assets/Img/<?=$item['image']?>" alt="">
                            <div class="Perfume_Name"> <?=$item['name']?> </div>
                            <div class="Perfume_Prize"> <?=number_format($item['price'],2,'.',' ')?> € </div>
                        </a>
                <?php } ?>
            </div>

        </main>

        <section id="pagination">
            <a class="<?=($data['currentPage']<=1)? 'hidden':''?>" 
                href="/?filter=<?=$data['filter']?>&page=<?=$data['currentPage']-1?>" >
                
                <img src="../assets/Img/chevron-double-left.svg" alt="">
                Previous
            
            </a>

            <div> 
                <span class="current-page"><?=$data['currentPage']?> </span> 
                &nbsp;/ <?=$data['pages']?> page(s)
            </div>
            
            <a class="<?=($data['currentPage']==$data['pages'])? 'hidden':''?>"
                href="/?filter=<?=$data['filter']?>&page=<?=$data['currentPage']+1?>" >
                Next 
                <img src="../assets/Img/chevron-double-right.svg" alt="">
            </a>
        </section>

        <?php include './app/Views/Blocks/footer.php'; ?>

    </div>
    <script type="module" src="http://localhost:5173/@vite/client"></script>
    <script type="module" src="http://localhost:5173/assets/Js/main.js"></script>
    <!-- <script src="../assets/Js/main.js"> </script> -->
</body>
</html>