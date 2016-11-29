$(document).ready(function () {

    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output =(day < 10 ? '0' : '') + day  + '/' +
            (month < 10 ? '0' : '') + month + '/' +
            + d.getFullYear();
    $(".date").html(output);

    $("#ajoutermedicament").click(function () {
        $("table").append("<tr><td class = \"medicament\" ><p>ceci est un medicament</p><td><div class = \"edit\" > </div><div class = \"remove\" > </div></tr>");
        $(".edit").click(function () {
            edit(this);
        });
        $(".remove").click(function () {

            remove(this);
        });
    });
    $("#ajouternote").click(function () {
        $("table").append("<tr><td class=\"note\"><p>ceci est une note qui peut parfois etre un peu longue, et quand meme la taille de ce champ s'adapte automatiquement</p><td><div class=\"edit\"></div><div class=\"remove\"></div></tr>");
        $(".edit").click(function () {
            edit(this);
        });
        $(".remove").click(function () {

            $(this).parent().parent().html(" ");
        });
    });
    $(".edit").click(function () {
        edit(this);
    });
    $(".remove").click(function () {
        remove(this);
    });
    $(".done").click(function () {
        done(this);
    });


    function edit(a) {
        var x = $(a);
        var content;
        content = $(a).parent().parent().children("td").children("p").html();
        if (x.parent().parent().children("td").hasClass("medicament")) {
            $(a).parent().parent().html("<textarea class=\"medicamentinput\" >" + content + " </textarea><span class=\"done\"></span>");
        } else {

            $(a).parent().parent().html("<textarea class=\"noteinput\" >" + content + " </textarea><span class=\"done\"></span>");
        }

        $(document).ready(function () {
            $('textarea').elastic();
            $('textarea').trigger('update');
        });
        $(".done").click(function () {
            done(this);
        });
    }


    function done(a) {
        var x = $(a);
        var content;
        content = $(a).parent().children("textarea").val();
        if (x.parent().children("textarea").hasClass("medicamentinput")) {
            $(a).parent().html("<td class=\"medicament\"><p>" + content + "</p><td><div class = \"edit\"> </div><div class = \"remove\" > </div>");
        } else {
            $(a).parent().html("<td class=\"note\"><p>" + content + "</p><td><div class = \"edit\"> </div><div class = \"remove\" > </div>");
        }

        $(document).ready(function () {
            $('textarea').elastic();
            $('textarea').trigger('update');
        });

        $(".edit").click(function () {
            edit(this);
        });
        $(".remove").click(function () {
            remove(this);
        });
    }


    function remove(a) {
        $(a).parent().parent().html(" ");
    }

});