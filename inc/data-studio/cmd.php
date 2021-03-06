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

class DataStudioCmd {
  public function __construct () {

  }

  public static function generateUniqid () {
    return uniqid() . bin2hex( random_bytes( 8 ) ) . wp_get_current_user()->ID;
  }

  public static function createApp ( $name ) {
    $app_id = null;
    $name = sanitize_text_field( $name );

    $app_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $name,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'app',
    ));

    update_field( 'app_name', $name, $app_id );

    update_field( 'app_count_logic_groups', '0', $app_id );

    return $app_id;
  }

  public static function createLogicGroup ( $app_id, $name ) {
    $logic_group_id = null;
    $app_id = sanitize_text_field( $app_id );
    $name = sanitize_text_field( $name );

    $logic_group_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $name,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'logic_group',
    ));

    update_field( 'logic_group_app_id', $app_id, $logic_group_id );

    update_field( 'logic_group_name', $name, $logic_group_id );

    update_field( 'logic_group_count_models', '0', $logic_group_id );
    update_field( 'logic_group_count_commands', '0', $logic_group_id );
    update_field( 'logic_group_count_queries', '0', $logic_group_id );

    return $logic_group_id;
  }

  public static function createWebService ( $app_id, $name ) {
    $web_service_id = null;
    $app_id = sanitize_text_field( $app_id );
    $name = sanitize_text_field( $name );

    $web_service_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $name,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'web_service',
    ));

    update_field( 'web_service_app_id', $app_id, $web_service_id );

    update_field( 'web_service_name', $name, $web_service_id );

    update_field( 'web_service_count_paths', '0', $logic_group_id );

    return $web_service_id;
  }

  public static function createPath ( $web_service_id, $uri ) {
    $path_id = null;
    $web_service_id = sanitize_text_field( $web_service_id );
    $uri = sanitize_text_field( $uri );

    $path_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $uri,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'path',
    ));

    update_field( 'path_web_service_id', $web_service_id, $path_id );

    update_field( 'path_uri', $uri, $path_id );

    update_field( 'path_count_operations', '0', $path_id );

    return $path_id;
  }

  public static function createOperation ( $path_id, $name, $type ) {
    $operation_id = null;
    $path_id = sanitize_text_field( $path_id );
    $name = sanitize_text_field( $name );
    $type = sanitize_text_field( $type );

    $operation_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $type . '::' . $name,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'operation',
    ));

    update_field( 'operation_path_id', $path_id, $operation_id );

    update_field( 'operation_name', $name, $operation_id );
    update_field( 'operation_type', $type, $operation_id );

    return $operation_id;
  }

  public static function createModel ( $logic_group_id, $name ) {
    $model_id = null;
    $logic_group_id = sanitize_text_field( $logic_group_id );
    $name = sanitize_text_field( $name );

    $model_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $name,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'model',
    ));

    update_field( 'model_logic_group_id', $logic_group_id, $model_id );

    update_field( 'model_name', $name, $model_id );

    update_field( 'model_count_attributes', '0', $model_id );

    return $model_id;
  }

  public static function createAttribute ( $model_id, $name ) {
    $attribute_id = null;
    $model_id = sanitize_text_field( $model_id );
    $name = sanitize_text_field( $name );

    $attribute_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $name,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'attribute',
    ));

    update_field( 'attribute_model_id', $model_id, $attribute_id );

    update_field( 'attribute_name', $name, $attribute_id );

    return $attribute_id;
  }

  public static function createCommand ( $logic_group_id, $name ) {
    $command_id = null;
    $logic_group_id = sanitize_text_field( $logic_group_id );
    $name = sanitize_text_field( $name );

    $command_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $name,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'command',
    ));

    update_field( 'command_logic_group_id', $logic_group_id, $command_id );

    update_field( 'command_name', $name, $command_id );

    return $command_id;
  }

  public static function createQuery ( $logic_group_id, $name ) {
    $query_id = null;
    $logic_group_id = sanitize_text_field( $logic_group_id );
    $name = sanitize_text_field( $name );

    $query_id = wp_insert_post(array(
      'post_author'  => wp_get_current_user()->ID,
      'post_content' => $name,
      'post_title'   => DataStudioCmd::generateUniqid(),
      'post_status'  => 'publish',
      'post_type'    => 'query',
    ));

    update_field( 'query_logic_group_id', $logic_group_id, $query_id );

    update_field( 'query_name', $name, $query_id );

    return $query_id;
  }

  public static function setAppName ( $app_id, $new_value ) {
    $app_id = sanitize_text_field( $app_id );
    $new_value = sanitize_text_field( $new_value );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $app_id ) ) {
      return;
    }
    update_field( 'app_name', $new_value, $app_id );
  }

  public static function setLogicGroupName ( $logic_group_id, $new_value ) {
    $logic_group_id = sanitize_text_field( $logic_group_id );
    $new_value = sanitize_text_field( $new_value );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $logic_group_id ) ) {
      return;
    }
    update_field( 'logic_group_name', $new_value, $logic_group_id );
  }

  public static function setModelName ( $model_id, $new_value ) {
    $model_id = sanitize_text_field( $model_id );
    $new_value = sanitize_text_field( $new_value );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $model_id ) ) {
      return;
    }
    update_field( 'model_name', $new_value, $model_id );
  }

  public static function setAttributeName ( $attribute_id, $new_value ) {
    $attribute_id = sanitize_text_field( $attribute_id );
    $new_value = sanitize_text_field( $new_value );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $attribute_id ) ) {
      return;
    }
    update_field( 'attribute_name', $new_value, $attribute_id );
  }

  public static function setCommandName ( $command_id, $new_value ) {
    $command_id = sanitize_text_field( $command_id );
    $new_value = sanitize_text_field( $new_value );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $command_id ) ) {
      return;
    }
    update_field( 'command_name', $new_value, $command_id );
  }

  public static function setQueryName ( $query_id, $new_value ) {
    $query_id = sanitize_text_field( $query_id );
    $new_value = sanitize_text_field( $new_value );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $query_id ) ) {
      return;
    }
    update_field( 'query_name', $new_value, $query_id );
  }

  public static function deleteApp ( $app_id ) {
    $app_id = sanitize_text_field( $app_id );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $app_id ) ) {
      return;
    }

  }

  public static function deleteLogicGroup ( $logic_group_id ) {
    $logic_group_id = sanitize_text_field( $logic_group_id );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $logic_group_id ) ) {
      return;
    }

  }

  public static function deleteModel ( $model_id ) {
    $model_id = sanitize_text_field( $model_id );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $model_id ) ) {
      return;
    }

  }

  public static function deleteAttribute ( $attribute_id ) {
    $attribute_id = sanitize_text_field( $attribute_id );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $attribute_id ) ) {
      return;
    }

  }

  public static function deleteCommand ( $command_id ) {
    $command_id = sanitize_text_field( $command_id );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $command_id ) ) {
      return;
    }

  }

  public static function deleteQuery ( $query_id ) {
    $query_id = sanitize_text_field( $query_id );
    if ( wp_get_current_user()->ID !== get_the_author_meta( 'ID', $query_id ) ) {
      return;
    }

  }
}
