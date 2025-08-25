<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>a::after {
        display: block;
        content: "";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 4px 0 4px 4px;
        border-left-color: #000;
        margin-top: 6px;
        margin-right: -10px;
    }

    .dropdown-submenu>ul.dropdown-menu {
        position: absolute;
        left: 100%;
        top: 0;
        margin-left: 5px;
    }
</style>