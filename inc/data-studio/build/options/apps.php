<?php
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
 */

add_filter(
  DS_APP_BUILD_OPTIONS,
  'datastudio_build_app_as_php_opts',
  10,
  3
);

add_filter(
  DS_APP_BUILD_OPTIONS,
  'datastudio_build_app_as_wordpress_opts',
  10,
  3
);

function datastudio_build_app_as_php_opts ( $options ) {
  $options['php_classes'] = 'PHP Classes';
  return $options;
}

function datastudio_build_app_as_wordpress_opts ( $options ) {
  $options['wordpress'] = 'WordPress Theme';
  return $options;
}
