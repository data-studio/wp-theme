/**
 * Copyright (c) 2018 Callan Peter Milne
 *
 * Permission to use, copy, modify, and/or distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
 * REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
 * INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
 * LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
 * OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
 * PERFORMANCE OF THIS SOFTWARE.
 */"use strict";

(function ($, data_studio_ajax_object) {"use strict";
  data_studio_ajax_object = data_studio_ajax_object || {};

  var _ajax_url = data_studio_ajax_object.ajax_url;

  (function ($) {"use strict";
    $.dsFormToggle = function ( _d ) {
      _d = _d || {};
      var $formEl = _d.$formEl;
      var $toggleBtnEl = _d.$toggleBtnEl;
      var formHidden = false;
      hideCreateForm();
      $toggleBtnEl.click(function () {
        toggleCreateForm();
      });
      function toggleCreateForm () {
        if (formHidden) {
          return showCreateForm();
        }
        return hideCreateForm();
      }
      function hideCreateForm () {
        $formEl.hide();
        formHidden = true;
      }
      function showCreateForm () {
        $formEl.show();
        formHidden = false;
      }
    };
  })($);
})(jQuery, data_studio_ajax_object);
