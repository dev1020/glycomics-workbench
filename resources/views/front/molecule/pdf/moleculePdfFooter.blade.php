<style>

    * {
        box-sizing: content-box;
    }
    html {
        -webkit-print-color-adjust: exact;
    }
    a.cross-reference::after {
        content: " [See” target-content(attr(href) “ on page “ target-counter(attr(href), page) "]"
    }
    footer {
        width: 100%;
        margin-bottom: -25px;
        display: flex;
        flex-direction: row;
        background-color: #F6F5F5FF;
    }

    footer>div {
        width: 100%;
        height: 30px;
        font-size: 10px;
        text-align: center;
        padding-top: 20px;
    }
</style>
<footer>
    <div> </div>
    <div>
        Page @pageNumber of @totalPages
    </div>
    <div style="text-align: right;padding-right: 50px">
        <strong><a style="text-decoration: none;" target="_blank" href="{{url('/')}}">{{config('app.name')}}</a></strong>
    </div>
</footer>

