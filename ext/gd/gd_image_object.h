/*
   +----------------------------------------------------------------------+
   | Copyright (c) The PHP Group                                          |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | http://www.php.net/license/3_01.txt                                  |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
   | Authors: Mark Randall <marandall@php.net>                            |
   +----------------------------------------------------------------------+
 */

#ifndef SRC_GD_IMAGE_OBJECT_H
#define SRC_GD_IMAGE_OBJECT_H

#include <php.h>
#include <gd.h>

zend_class_entry *gd_image_ce;

typedef struct _gd_ext_image_object {
    gdImagePtr image;
	zend_object std;
} php_gd_image_object;

void php_gd_object_minit_helper();

static zend_always_inline php_gd_image_object* php_gd_exgdimage_from_zobj_p(zend_object* obj)
{
	return (php_gd_image_object *) ((char *) (obj) - XtOffsetOf(php_gd_image_object, std));
}

static zend_always_inline gdImagePtr php_gd_libgdimageptr_from_zval_p(zval* zp)
{
	return php_gd_exgdimage_from_zobj_p(Z_OBJ_P(zp))->image;
}

void php_gd_assign_libgdimageptr_as_extgdimage(zval* val, gdImagePtr image);

#endif //SRC_GD_IMAGE_OBJECT_H
