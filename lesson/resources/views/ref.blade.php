<html>
<style>
    .table {
        width: 1200px;
        margin: 0 auto;
        border: 1px solid black;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        border-bottom: 1px solid black;
    }
    .row:nth-child(odd) {
        background: #f5f5f5;
    }
    .left_ttl {
        width: 30%;
        padding: 15px;
        font-weight: bold;
        box-sizing: border-box;
    }
    .right_ttl {
        width: 70%;
        padding: 15px;
        font-weight: bold;
        box-sizing: border-box;
    }
    .left {
        width: 30%;
        padding: 5px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        border-right: 1px solid black;
    }
    .right {
        width: 70%;
    }
    .right_item {
        padding: 5px;
        box-sizing: border-box;
        border-bottom: 1px solid black;
    }
    .right_item:last-child {
        border-bottom: none;
    }
</style>
<body>
<div class="table">
    <div class="row">
        <div class="left_ttl">
            Title
        </div>
        <div class="right_ttl">
            Ref
        </div>
    </div>
    <?php
        foreach ($posts as $item) {
            echo "<div class='row'>
                     <div class='left' >{$item['title']}</div>";
            if(empty(count($item['ref']))) echo "<div class='right'></div>";
            else {
                echo "<div class='right'>";
                foreach ($item['ref'] as $ref) echo "<div class='right_item'>{$ref}</div>";
                echo "</div>";
            }
             echo "</div>";
        }
    ?>
</div>
</body>
</html>