<!DOCTYPE html>
<body>
<div class="main">
    <div style="position:relative;float:left;width: 30%;">
        <img src={imglink} style="height: 200px;width: 200px;">
    </div>
    <div style="position:relative;float:left;width: 70%;">
        <h1>{name}</h1>
        <h2>{categori}</h2>
        <h2>De la {minprice} RON</h2>
    </div>
    <div style="position:relative;width: 100%;">
        <p> {items[0][shopname]}</p>
        <p> {items[0][price]}</p>
        <a href="{items[0][link]}">Cumpara aici</a>
    </div>
    <br>
    <div style="position:relative;width: 100%;">
        <p> {items[1][shopname]}</p>
        <p> {items[1][price]}</p>
        <a href="{items[1][link]}">Cumpara aici</a>
    </div>
</div>
</body>