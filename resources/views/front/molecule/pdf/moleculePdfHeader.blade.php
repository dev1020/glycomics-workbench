<style>
    body{
        font-family: "Roboto", sans-serif;
        font-optical-sizing: auto;
    }
    header {
        width: 100%;

        display: flex;
        margin-top: -20px;
        flex-direction: row;
        background-color: #F6F5F5FF;
    }

    header>div {
        width: 100%;
        height: 36px;
        font-size: 10px;
        padding-top: 20px;

        text-align: center;
    }

</style>
<header>
    <div style="text-align: left;padding-left: 50px">
        Molecule - <strong>{{ucwords($molecule->molecule_main_title)}}</strong>
    </div>
    <div>

    </div>
    <div style="text-align: right;padding-right: 50px">
        Author - <strong>{{ucwords($molecule->molecule_author)}}</strong>
    </div>
</header>

