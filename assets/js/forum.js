(function ($) {
  "use strict";

  $(window).on("load", function () {

    $(".post-pagination > li:nth-child(1) > a").addClass("current");
    $(".newest_posts").addClass("active-short");
    docy_forum.docy_search(
      "#search_field",
      "#UserList .userlist",
      ".current-user"
    );
    docy_forum.docy_search(
      "#search_fields",
      "#tagList .tagList",
      ".dropdown-item"
    );
    docy_forum.docy_loading_forum();
    docy_forum.docy_open_forum();
    docy_forum.docy_sort_forum();
  });

  var docy_forum = {
    docy_search: function (
      search_field,
      searchable_elements,
      searchable_text_class
    ) {
      $(search_field).keyup(function (e) {
        e.preventDefault();
        var query = $(this).val().toLowerCase();
        if (query) {
          $.each($(searchable_elements), function () {
            var title = $(this)
              .find(searchable_text_class)
              .text()
              .toLowerCase();
            if (title.indexOf(query) == -1) {
              $(this).hide();
            } else {
              $(this).show();
            }
          });
        } else {
          $(searchable_elements).show();
        }
      });
    },
    docy_auth_select: function () {
      $(document).on("click", ".data-auth", function () {
        var _this = $(this),
          text = _this.text();
        $(".UserList").html(text);
      });
    },
    docy_tag_select: function () {
      $(document).on("click", ".data-tag", function () {
        var _this = $(this),
          text = _this.text();
        $(".tagLista").html(text);
      });
    },
    docy_loading_forum: function () {
      $(document).on("click", ".docy-data", function () {
        $(".docy-data").removeClass("loading");
        $(".close-ticket.reset-btn").addClass("reset-btn-active");
        var _this = $(this),
          _ajaxUrl = DocyForum.ajax_url,
          _class = _this.addClass("loading selected"),
          _a = "docy_loading_post",
          _n = DocyForum.docy_nonce,
          _t = _this.data("type"),
          _id = _this.data("id"),
          _parent = _this.data("parent"),
          _count = _this.data("count"),
          data = {
            type: _t,
            action: _a,
            nonce: _n,
            a_t_id: _id,
            count: _count,
            parent: _parent,
          };

        if ($(this).hasClass("loading")) {
          $.ajax({
            url: _ajaxUrl,
            method: "post",
            data: data,
            beforeSend: function () {
              $(".load-forum").html(
                "<div class='forum-loading'><div class='configure-border-1'><div class='configure-core'></div></div><div class='configure-border-2'><div class='configure-core'></div></div></div>"
              );
            },
            success: function (response) {
              $(".load-forum").html(response);
            },
            error: function () {
              console.log("Oops! Something wrong, try again!");
            },
          });
        }

        return false;
      });
    },
    docy_open_forum: function () {
      $(document).on("click", ".open-data", function () {
        $(".open-data").removeClass("loading");
        $(this).parent().removeClass("reset-btn-active");
        $('.sort-by').removeClass('active-short');
        $('.newest_posts').addClass('active-short');
        var _this = $(this),
          _ajaxUrl = DocyForum.ajax_url,
          _class = _this.addClass("loading selected"),
          _a = "docy_open_post",
          _n = DocyForum.docy_nonce,
          _t = _this.data("type"),
          _id = _this.data("id"),
          _count = _this.data("count"),
          _parent = _this.data("parent"),
          data = {
            type: _t,
            action: _a,
            nonce: _n,
            a_t_id: _id,
            count: _count,
            parent: _parent,
          };

        if ($(this).hasClass("loading")) {
          $.ajax({
            url: _ajaxUrl,
            method: "post",
            data: data,
            beforeSend: function () {
              $(".load-forum").html(
                "<div class='forum-loading'><div class='configure-border-1'><div class='configure-core'></div></div><div class='configure-border-2'><div class='configure-core'></div></div></div>"
              );
            },
            success: function (response) {
              $(".load-forum").html(response);
            },
            error: function () {
              console.log("Oops! Something wrong, try again!");
            },
          });
        }

        return false;
      });
    },
    docy_sort_forum: function () {
      $(document).on("click", ".sort-by", function () {
        $(".sort-by").removeClass("loading");
        $(".close-ticket.reset-btn").addClass("reset-btn-active");
        var _this = $(this),
          _ajaxUrl = DocyForum.ajax_url,
          _class = _this.addClass("loading active-short"),
          _parent = _this.data("parent"),
          _a = "docy_loading_sort_post",
          _n = DocyForum.docy_nonce,
          _sort = _this.data("sort"),
          data = {
            action: _a,
            nonce: _n,
            sort: _sort,
            parent: _parent,
          };
        if ($(this).hasClass("loading")) {
          $.ajax({
            url: _ajaxUrl,
            method: "post",
            data: data,
            beforeSend: function () {
              $(".load-forum").html(
                "<div class='forum-loading'><div class='configure-border-1'><div class='configure-core'></div></div><div class='configure-border-2'><div class='configure-core'></div></div></div>"
              );
            },
            success: function (response) {
              $(".load-forum").html(response);
            },
            error: function () {
              console.log("Oops! Something wrong, try again!");
            },
          });
        }

        return false;
      });
    },
  };

  $('[id]').each(function () {
    $('[id="' + this.id + '"]:gt(0)').remove();
  });

  $('a.prev.page-numbers').html('<i class="arrow_carrot-left"></i>');
  $('a.next.page-numbers').html('<i class="arrow_carrot-right"></i>');

})(jQuery);
