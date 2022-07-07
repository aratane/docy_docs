;(function ($) {
    "use strict";

    $(document).ready(function() {

        /*--------------- nav-sidebar js--------*/
        if ($('.nav-sidebar > li').hasClass('active')) {
            $(".nav-sidebar > li.active").find('ul').slideDown(700);
        }

        function active_dropdown(is_ajax = false) {
            if ( is_ajax == true) {
                $(document).on('click', '.nav-sidebar .nav-item .nav-link', function (e) {
                    $('.nav-sidebar .nav-item').removeClass('active')
                    $(this).parent().addClass('active')
                    $(this).parent().find('ul').first().show(300)
                    $(this).parent().siblings().find('ul').hide(300)
                })
            } else {
                $('.nav-sidebar > li .icon').on('click', function (e) {
                    $(this).parent().find('ul').first().toggle(300)
                    $(this).parent().siblings().find('ul').hide(300)
                })
            }
        }

        active_dropdown()

        $('.nav-sidebar > li .icon').each(function () {
            let $this = $(this)
            $this.on('click', function (e) {
                let has = $this.parent().hasClass('active')
                $('.nav-sidebar li').removeClass('active')
                if (has) {
                    $this.parent().removeClass('active')
                } else {
                    $this.parent().addClass('active')
                }
            })
        })

        /**
         * Print doc
         */
        $('.pageSideSection .print').on('click', function (e) {
            e.preventDefault()
            $(".doc-middle-content .doc-post-content").printThis({
                //'importCSS': true,
                'loadCSS' : docy_local_object.DOCY_DIR_CSS + '/print.css'
            })
        })

        /**
         * Doc : On this page
         * @param str
         * @returns {string}
         */
        var slug = function(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
            var to   = "aaaaaeeeeeiiiiooooouuuunc------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function convertToTitle(Text) {
            let title = Text.replaceAll('-', ' ');
            return capitalizeFirstLetter(title)
        }

        function isNumeric(value) {
            let firstStr = value.charAt(0);
            return /^-?\d+$/.test(firstStr);
        }

        function onThisPageTitles( divs, changelogs = false ) {
            let ids = [];
            let titles = [];
            jQuery(divs).each(function () {
                let idText = $(this).attr("id")

                // Add title attribute
                if ( changelogs === false ) {
                    let titleText = $(this).text()
                    $(this).attr("title", titleText)
                }

                // Modify the ID
                let isFirstCharNumber = isNumeric(idText)
                if ( isFirstCharNumber === true ) {
                    $(this).attr("id", 'docy-'+idText)
                }
                // ID and Title pushing into the arrays
                ids.push( $(this).attr("id") );
                titles.push( $(this).attr("title") )
            });
            ids.forEach(onThisPageID)
            titles.forEach(onThisPageTitle)


            function onThisPageID(item, index) {
                document.getElementById("navbar-example3").innerHTML += "<a class='nav-link link-"+index+"' href='#" + item + "'>" + item + " </a>"
            }

            function onThisPageTitle(item, index) {
                $('#navbar-example3 .link-'+index).text(item)
            }


            // table of contents on top
            ids.forEach(onThisPageIDTop);
            function onThisPageIDTop(item, index) {
                if ( $('#docy-top-toc').length ) {
                    let selector = "#"+item +' \+ p';
                    let content = document.querySelector(selector).innerHTML;
                    if(content.length > 80) content = content.substring(0, 80);

                    // header table of contents
                    document.getElementById("docy-top-toc").innerHTML += " <div class='col-lg-4 col-md-6'>" +
                        "<a class='tip_item link-"+index+"' href='#" + item + "'>" +
                        "<div class='tip_box'>" +
                        "<h4 class='tip_title title-"+index+"'></h4>" +
                        "<p class='tip_para'>"+ content +"...</p>"+
                        "</div></a></div>"

                }
            }

            titles.forEach(onThisPageTitleTop);
            function onThisPageTitleTop(item, index) {
                $('#docy-top-toc .title-'+index).text(item)
            }
        }

        // Doc on this page nav
        function doc_toc_enable(ajax = false) {
            if ( ajax == true ) {
                $("#navbar-example3").html('');
            }
            if ( $(".doc-middle-content #post h2").length ) {
                anchors.options = {
                    icon: '#'
                };
                anchors.add('.doc-middle-content #post h2');
                onThisPageTitles($(".doc-middle-content #post h2").toArray())
            }

            // Anchor enabled titles
            if ( $(".anchor-enabled h2").length ) {
                anchors.options = {
                    icon: '#'
                };
                anchors.add('.anchor-enabled h2');
                onThisPageTitles($(".anchor-enabled h2").toArray())
            }

            // Changelog on this page nav
            if ( $(".changelog_inner .changelog_info").length ) {
                onThisPageTitles( $(".changelog_inner .changelog_info").toArray(), true );
            }
        }

        doc_toc_enable()

        /**
         * Doc Menu
         */
        $('.doc_menu a[href^="#"]:not([href="#"]').on('click', function (event) {
            var $anchor = $(this)
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 900)
            event.preventDefault()
        });

        /**
         * Left Sidebar Toggle icon
         */
        if ($(".doc_documentation_area").length > 0) {
            //switcher
            var switchs = true;
            $("#right").on("click", function (e) {
                e.preventDefault();
                if (switchs) {
                    $(".doc_documentation_area,#right").addClass("overlay");
                    $(".doc_right_mobile_menu").animate({
                        "right": "0px"
                    }, 100);
                    switchs = false;
                } else {
                    $(".doc_documentation_area,#right").removeClass("overlay");
                    $(".doc_right_mobile_menu").animate({
                        "right": "-250px"
                    }, 100);
                    switchs = true;
                }
            })

            $("#left").on("click", function (e) {
                e.preventDefault()
                if (switchs) {
                    $(".doc_documentation_area,#left").addClass("overlay");
                    $(".doc_mobile_menu").animate({
                        "left": "0px"
                    }, 300);
                    switchs = false;
                } else {
                    $(".doc_documentation_area,#left").removeClass("overlay");
                    let left_menu_width = $(".doc_mobile_menu").css('max-width')
                    $(".doc_mobile_menu").animate({
                        "left": "-"+left_menu_width
                    }, 300);
                    switchs = true
                }
            });
        }

        // Mobile menu on the Doc single page
        $('.single-docs .mobile_menu_btn').on('click', function () {
            $('body').removeClass('menu-is-closed').addClass('menu-is-opened');
        });

        $('.single-docs .close_nav').on("click", function (e) {
            if ($('.side_menu').hasClass('menu-opened')) {
                $('.side_menu').removeClass('menu-opened')
                $('body').removeClass('menu-is-opened')
            } else {
                $('.side_menu').addClass('menu-opened')
            }
        });

        // Filter doc chapters
        if ( $('#doc_filter').length ) {
            $('#doc_filter').keyup(function () {
                var value = $(this).val().toLowerCase();
                $('.nav-sidebar .nav-item').each(function () {
                    var lcval = $(this).text().toLowerCase();
                    if (lcval.indexOf(value) > -1) {
                        $(this).show(500);
                    } else {
                        $(this).hide(500);
                    }
                });
            });

            document.getElementById("doc_filter").addEventListener("search", function (event) {
                $(".nav-sidebar .nav-item").show(300);
            });
        }

        // Collapse left sidebar
        function docLeftSidebarToggle() {
            let left_column = $('.doc_mobile_menu');
            let middle_column = $('.doc-middle-content');
            $('.left-sidebar-toggle .left-arrow').on('click', function () {
                $('.doc_mobile_menu').hide(500)

                if (middle_column.hasClass('col-lg-7')) {
                    $('.doc-middle-content').removeClass('col-lg-7').addClass('col-lg-10')
                } else if (middle_column.hasClass('col-lg-8')) {
                    $('.doc-middle-content').removeClass('col-lg-8').addClass('col-lg-10')
                }

                $('.left-sidebar-toggle .left-arrow').hide(500)
                $('.left-sidebar-toggle .right-arrow').show(500)
            })

            $('.left-sidebar-toggle .right-arrow').on('click', function () {
                $('.doc_mobile_menu').show(500)

                if (middle_column.hasClass('col-lg-10')) {
                    $('.doc-middle-content').removeClass('col-lg-10').addClass('col-lg-7')
                } else if (middle_column.hasClass('col-lg-8')) {
                    $('.doc-middle-content').removeClass('col-lg-10').addClass('col-lg-8')
                }

                $('.left-sidebar-toggle .left-arrow').show(500)
                $('.left-sidebar-toggle .right-arrow').hide(500)
            })
        }
        docLeftSidebarToggle()

        /**
         * Load Doc single page via ajax
         */
        if ( docy_local_object.is_doc_ajax == '1' ) {
            $(document).on('click', '.nav-sidebar .nav-item .dropdown_nav li a', function (e) {
                e.preventDefault()
                let self = $(this)
                let title = self.text()
                let postid = $(this).attr('data-postid')

                function changeurl(page_title) {
                    let new_url = self.attr('href');
                    window.history.pushState("data", "Title", new_url);
                    document.title = page_title;
                }

                $.ajax({
                    url: docy_local_object.ajaxurl,
                    method: "post",
                    data: {
                        action: 'docy_docs_single_content',
                        postid: postid
                    },
                    beforeSend: function () {
                        $("#reading-progress-fill").css({'width': '100%', 'display': 'block'});
                    },
                    success: function (response) {
                        $("#reading-progress-fill").css({'display': 'none'});
                        $(".doc-middle-content").html(response);
                        changeurl(title)
                        $('.nav-sidebar .nav-item .dropdown_nav li a').removeClass('active')
                        self.addClass('active')
                        doc_toc_enable(true)
                        docLeftSidebarToggle()
                    },
                    error: function () {
                        console.log("Oops! Something wrong, try again!");
                    }
                })
            })

            $(document).on('click', '.nav-sidebar .nav-item .nav-link', function (e) {
                e.preventDefault();
                let self = $(this)
                let title = self.text()
                let postid = $(this).attr('data-postid')

                function changeurl(page_title) {
                    let new_url = self.attr('href');
                    window.history.pushState("data", "Title", new_url);
                    document.title = page_title;
                }

                $.ajax({
                    url: docy_local_object.ajaxurl,
                    method: "post",
                    data: {
                        action: 'docy_docs_single_content',
                        postid: postid
                    },
                    beforeSend: function () {
                        $("#reading-progress-fill").css({'width': '100%', 'display': 'block'});
                    },
                    success: function (response) {
                        active_dropdown(true)
                        $("#reading-progress-fill").css({'display': 'none'});
                        $(".doc-middle-content").html(response);
                        changeurl(title)
                        docLeftSidebarToggle()
                    },
                    error: function () {
                        console.log("Oops! Something wrong, try again!");
                    }
                })
            })
        }
    })
})(jQuery);