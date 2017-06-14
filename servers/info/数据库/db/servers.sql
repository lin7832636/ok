-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-09 07:55:28
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `servers`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_access`
--

CREATE TABLE IF NOT EXISTS `sp_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `g` char(50) NOT NULL COMMENT '项目',
  `m` char(50) NOT NULL COMMENT '模块',
  `a` char(50) NOT NULL COMMENT '方法',
  KEY `groupId` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色授权表';

--
-- 转存表中的数据 `sp_access`
--

INSERT INTO `sp_access` (`role_id`, `g`, `m`, `a`) VALUES
(1, 'Admin', 'Template', 'edit'),
(1, 'Admin', 'Template', 'add'),
(1, 'Admin', 'Template', 'lists'),
(1, 'Admin', 'Website', 'index'),
(1, 'Admin', 'School', 'default'),
(1, 'Admin', 'Search', 'plug_displays'),
(1, 'Admin', 'Search', 'lists'),
(1, 'Admin', 'Text', 'lists'),
(1, 'Admin', 'Link', 'movedown'),
(1, 'Admin', 'Link', 'moveup'),
(1, 'Admin', 'Link', 'plug_displays'),
(1, 'Admin', 'Link', 'chose_tpl'),
(1, 'Admin', 'Link', 'link_attr'),
(1, 'Admin', 'Link', 'del'),
(1, 'Admin', 'Link', 'edit'),
(1, 'Admin', 'Link', 'add'),
(1, 'Admin', 'Link', 'lists'),
(1, 'Admin', 'Carousel', 'survey_add'),
(1, 'Admin', 'Carousel', 'vote_add'),
(1, 'Admin', 'Carousel', 'moveup'),
(1, 'Admin', 'Carousel', 'movedown'),
(1, 'Admin', 'Carousel', 'upload'),
(1, 'Admin', 'Carousel', 'plug_displays'),
(1, 'Admin', 'Carousel', 'tpl_attr'),
(1, 'Admin', 'Carousel', 'chose_style'),
(1, 'Admin', 'Carousel', 'del'),
(1, 'Admin', 'Carousel', 'edit'),
(1, 'Admin', 'Carousel', 'add'),
(1, 'Admin', 'Carousel', 'lists'),
(1, 'Admin', 'ArticleClass', 'plug_displays'),
(1, 'Admin', 'ArticleClass', 'check_navigation'),
(1, 'Admin', 'ArticleClass', 'attribute_set'),
(1, 'Admin', 'ArticleClass', 'template_app'),
(1, 'Admin', 'ArticleClass', 'mark_red'),
(1, 'Admin', 'ArticleClass', 'down'),
(1, 'Admin', 'ArticleClass', 'move'),
(1, 'Admin', 'ArticleClass', 'edit'),
(1, 'Admin', 'ArticleClass', 'del'),
(1, 'Admin', 'ArticleClass', 'add'),
(1, 'Admin', 'Article', 'article_add'),
(1, 'Admin', 'ArticleClass', 'lists'),
(1, 'Admin', 'Navigation', 'upload'),
(1, 'Admin', 'Navigation', 'nav_down'),
(1, 'Admin', 'Navigation', 'nav_move'),
(1, 'Admin', 'Navigation', 'article_down'),
(1, 'Admin', 'Navigation', 'article_move'),
(1, 'Admin', 'Navigation', 'article_del'),
(1, 'Admin', 'Navigation', 'article_edit'),
(1, 'Admin', 'Navigation', 'article_lists'),
(1, 'Admin', 'Navigation', 'article_add'),
(1, 'Admin', 'Navigation', 'plug_displays'),
(1, 'Admin', 'Navigation', 'template_app'),
(1, 'Admin', 'Navigation', 'nav_attr'),
(1, 'Admin', 'Navigation', 'del'),
(1, 'Admin', 'Navigation', 'edit'),
(1, 'Admin', 'Navigation', 'add'),
(1, 'Admin', 'Navigation', 'lists'),
(1, 'Admin', 'Plug', 'displays_fetch'),
(1, 'Admin', 'Plug', 'displays'),
(1, 'Admin', 'Plug', 'div_app_edit'),
(1, 'Admin', 'Plug', 'plug_add'),
(1, 'Admin', 'Plug', 'del'),
(1, 'Admin', 'Plug', 'edit'),
(1, 'Admin', 'Plug', 'add'),
(1, 'Admin', 'Plug', 'lists'),
(1, 'Admin', 'Image', 'plug_displays'),
(1, 'Admin', 'Image', 'plug_edit'),
(1, 'Admin', 'Image', 'index'),
(1, 'Admin', 'Plug', 'default'),
(1, 'Admin', 'Menu', 'listorders'),
(1, 'Admin', 'Menu', 'add_post'),
(1, 'Admin', 'Menu', 'add'),
(1, 'Admin', 'Menu', 'lists'),
(1, 'Admin', 'Menu', 'delete'),
(1, 'Admin', 'Menu', 'edit_post'),
(1, 'Admin', 'Menu', 'edit'),
(1, 'Admin', 'Menu', 'export_menu'),
(1, 'Admin', 'Menu', 'index'),
(1, 'Admin', 'Menu', 'default'),
(1, 'Admin', 'User', 'add_post'),
(1, 'Admin', 'User', 'add'),
(1, 'Admin', 'User', 'edit_post'),
(1, 'Admin', 'User', 'edit'),
(1, 'Admin', 'User', 'delete'),
(1, 'Admin', 'User', 'index'),
(1, 'Admin', 'Rbac', 'roleadd_post'),
(1, 'Admin', 'Rbac', 'roleadd'),
(1, 'Admin', 'Rbac', 'roledelete'),
(1, 'Admin', 'Rbac', 'roleedit_post'),
(1, 'Admin', 'Rbac', 'roleedit'),
(1, 'Admin', 'Rbac', 'authorize_post'),
(1, 'Admin', 'Rbac', 'authorize'),
(1, 'Admin', 'Rbac', 'member'),
(1, 'Admin', 'Rbac', 'index'),
(1, 'Member', 'Indexadmin', 'default3'),
(1, 'Member', 'Indexadmin', 'default'),
(1, 'Admin', 'Setting', 'password_post'),
(1, 'Admin', 'Setting', 'password'),
(1, 'Admin', 'User', 'userinfo_post'),
(1, 'Admin', 'User', 'userinfo'),
(1, 'Admin', 'Setting', 'userdefault'),
(1, 'Admin', 'Setting', 'default'),
(1, 'Admin', 'Template', 'del'),
(1, 'Admin', 'Template', 'template_public_list'),
(1, 'Admin', 'Template', 'template_public_add'),
(1, 'Admin', 'Template', 'template_public_edit'),
(1, 'Admin', 'Template', 'template_public_del'),
(1, 'Admin', 'Template', 'template_list'),
(1, 'Admin', 'Template', 'displays'),
(1, 'Admin', 'School', 'index'),
(1, 'Admin', 'School', 'del'),
(1, 'Admin', 'School', 'edit'),
(1, 'Admin', 'School', 'save'),
(1, 'Admin', 'School', 'add'),
(1, 'Admin', 'School', 'lists'),
(1, 'Admin', 'School', 'school_list'),
(1, 'Admin', 'Ad', 'index'),
(1, 'Admin', 'Ad', 'delete'),
(1, 'Admin', 'Ad', 'edit'),
(1, 'Admin', 'Ad', 'edit_post'),
(1, 'Admin', 'Ad', 'add'),
(1, 'Admin', 'Ad', 'add_post'),
(1, 'Admin', 'Ad', 'togglestatus'),
(1, 'Admin', 'Layout', 'default'),
(1, 'Admin', 'Layout', 'index'),
(1, 'Admin', 'Layout', 'edit'),
(1, 'Admin', 'Layout', 'del'),
(1, 'Admin', 'Layout', 'div_app_del'),
(1, 'Admin', 'Layout', 'body_background_set'),
(1, 'Admin', 'Layout', 'add'),
(4, 'Admin', 'Layout', 'default'),
(4, 'Admin', 'Ad', 'togglestatus'),
(4, 'Admin', 'Ad', 'add_post'),
(4, 'Admin', 'Ad', 'add'),
(4, 'Admin', 'Ad', 'edit_post'),
(4, 'Admin', 'Ad', 'edit'),
(4, 'Admin', 'Ad', 'delete'),
(4, 'Admin', 'Ad', 'index'),
(4, 'Admin', 'Template', 'displays'),
(4, 'Admin', 'Template', 'edit'),
(4, 'Admin', 'Template', 'lists'),
(4, 'Admin', 'Website', 'index'),
(5, 'Admin', 'Layout', 'add'),
(4, 'Admin', 'School', 'default'),
(4, 'Admin', 'Login', 'plug_displays'),
(4, 'Admin', 'Login', 'add'),
(4, 'Admin', 'Login', 'uploads'),
(4, 'Admin', 'Login', 'lists'),
(4, 'Admin', 'Search', 'upload'),
(4, 'Admin', 'Search', 'plug_displays'),
(4, 'Admin', 'Search', 'lists'),
(4, 'Admin', 'Text', 'link_attr'),
(4, 'Admin', 'Text', 'plug_displays'),
(4, 'Admin', 'Text', 'lists'),
(4, 'Admin', 'Link', 'upload_image'),
(4, 'Admin', 'Link', 'movedown'),
(4, 'Admin', 'Link', 'moveup'),
(4, 'Admin', 'Link', 'plug_displays'),
(4, 'Admin', 'Link', 'link_attr'),
(4, 'Admin', 'Link', 'del'),
(4, 'Admin', 'Link', 'edit'),
(4, 'Admin', 'Link', 'add'),
(4, 'Admin', 'Link', 'lists'),
(4, 'Admin', 'Carousel', 'del_tupian'),
(4, 'Admin', 'Carousel', 'survey_add'),
(4, 'Admin', 'Carousel', 'vote_add'),
(4, 'Admin', 'Carousel', 'moveup'),
(4, 'Admin', 'Carousel', 'movedown'),
(4, 'Admin', 'Carousel', 'upload'),
(4, 'Admin', 'Carousel', 'plug_displays'),
(4, 'Admin', 'Carousel', 'tpl_attr'),
(4, 'Admin', 'Carousel', 'del'),
(4, 'Admin', 'Carousel', 'edit'),
(4, 'Admin', 'Carousel', 'add'),
(4, 'Admin', 'Carousel', 'lists'),
(4, 'Admin', 'ArticleClass', 'upload'),
(4, 'Admin', 'ArticleClass', 'del_tupian'),
(4, 'Admin', 'Survey', 'upload'),
(4, 'Admin', 'Survey', 'add'),
(4, 'Admin', 'Vote', 'uploads_image'),
(4, 'Admin', 'Vote', 'add'),
(4, 'Admin', 'Ueditor', 'get_remote_image'),
(4, 'Admin', 'Ueditor', 'getfiles'),
(4, 'Admin', 'Ueditor', 'imageManager'),
(4, 'Admin', 'Ueditor', 'uploadimg'),
(4, 'Admin', 'ArticleClass', 'plug_displays'),
(4, 'Admin', 'ArticleClass', 'check_navigation'),
(4, 'Admin', 'ArticleClass', 'attribute_set'),
(4, 'Admin', 'ArticleClass', 'mark_red'),
(4, 'Admin', 'ArticleClass', 'down'),
(4, 'Admin', 'ArticleClass', 'move'),
(4, 'Admin', 'ArticleClass', 'edit'),
(4, 'Admin', 'ArticleClass', 'del'),
(4, 'Admin', 'ArticleClass', 'add'),
(4, 'Admin', 'Article', 'article_add'),
(4, 'Admin', 'ArticleClass', 'lists'),
(4, 'Admin', 'Article', 'article_edit'),
(4, 'Admin', 'Navigation', 'upload'),
(4, 'Admin', 'Navigation', 'nav_down'),
(4, 'Admin', 'Navigation', 'nav_move'),
(4, 'Admin', 'Navigation', 'article_down'),
(4, 'Admin', 'Navigation', 'article_move'),
(4, 'Admin', 'Navigation', 'article_del'),
(4, 'Admin', 'Navigation', 'article_edit'),
(4, 'Admin', 'Navigation', 'article_lists'),
(4, 'Admin', 'Navigation', 'article_add'),
(4, 'Admin', 'Navigation', 'plug_displays'),
(4, 'Admin', 'Navigation', 'nav_attr'),
(4, 'Admin', 'Navigation', 'del'),
(4, 'Admin', 'Navigation', 'edit'),
(4, 'Admin', 'Navigation', 'add'),
(4, 'Admin', 'Navigation', 'lists'),
(4, 'Admin', 'Plug', 'displays'),
(4, 'Admin', 'Plug', 'div_app_edit'),
(4, 'Admin', 'Plug', 'lists'),
(4, 'Admin', 'Image', 'plug_displays'),
(4, 'Admin', 'Image', 'plug_edit'),
(4, 'Admin', 'Image', 'index'),
(4, 'Admin', 'Plug', 'default'),
(4, 'Admin', 'Setting', 'password_post'),
(4, 'Admin', 'Setting', 'password'),
(4, 'Admin', 'User', 'userinfo_post'),
(4, 'Admin', 'User', 'userinfo'),
(4, 'Admin', 'Setting', 'userdefault'),
(5, 'Admin', 'Layout', 'body_background_set'),
(5, 'Admin', 'Layout', 'div_app_del'),
(5, 'Admin', 'Layout', 'del'),
(5, 'Admin', 'Layout', 'edit'),
(5, 'Admin', 'Layout', 'index'),
(5, 'Admin', 'Layout', 'default'),
(5, 'Admin', 'Ad', 'togglestatus'),
(5, 'Admin', 'Ad', 'add_post'),
(5, 'Admin', 'Ad', 'add'),
(5, 'Admin', 'Ad', 'edit_post'),
(5, 'Admin', 'Ad', 'edit'),
(5, 'Admin', 'Ad', 'delete'),
(5, 'Admin', 'Ad', 'index'),
(5, 'Admin', 'School', 'lists'),
(5, 'Admin', 'School', 'save'),
(5, 'Admin', 'School', 'edit'),
(5, 'Admin', 'School', 'index'),
(5, 'Admin', 'Template', 'displays'),
(5, 'Admin', 'Template', 'del'),
(5, 'Admin', 'Template', 'edit'),
(5, 'Admin', 'Template', 'add'),
(5, 'Admin', 'Template', 'lists'),
(5, 'Admin', 'Website', 'index'),
(5, 'Admin', 'School', 'default'),
(5, 'Admin', 'Login', 'plug_displays'),
(5, 'Admin', 'Login', 'add'),
(5, 'Admin', 'Login', 'uploads'),
(5, 'Admin', 'Login', 'lists'),
(5, 'Admin', 'Search', 'plug_displays'),
(5, 'Admin', 'Search', 'lists'),
(5, 'Admin', 'Text', 'link_attr'),
(5, 'Admin', 'Text', 'plug_displays'),
(5, 'Admin', 'Text', 'lists'),
(5, 'Admin', 'Link', 'movedown'),
(5, 'Admin', 'Link', 'moveup'),
(5, 'Admin', 'Link', 'plug_displays'),
(5, 'Admin', 'Link', 'chose_tpl'),
(5, 'Admin', 'Link', 'link_attr'),
(5, 'Admin', 'Link', 'del'),
(5, 'Admin', 'Link', 'edit'),
(5, 'Admin', 'Link', 'add'),
(5, 'Admin', 'Link', 'lists'),
(5, 'Admin', 'Carousel', 'survey_add'),
(5, 'Admin', 'Carousel', 'vote_add'),
(5, 'Admin', 'Carousel', 'moveup'),
(5, 'Admin', 'Carousel', 'movedown'),
(5, 'Admin', 'Carousel', 'upload'),
(5, 'Admin', 'Carousel', 'plug_displays'),
(5, 'Admin', 'Carousel', 'tpl_attr'),
(5, 'Admin', 'Carousel', 'chose_style'),
(5, 'Admin', 'Carousel', 'del'),
(5, 'Admin', 'Carousel', 'edit'),
(5, 'Admin', 'Carousel', 'add'),
(5, 'Admin', 'Carousel', 'lists'),
(5, 'Admin', 'Survey', 'upload'),
(5, 'Admin', 'Survey', 'add'),
(5, 'Admin', 'Vote', 'uploads_image'),
(5, 'Admin', 'Vote', 'add'),
(5, 'Admin', 'Ueditor', 'get_remote_image'),
(5, 'Admin', 'Ueditor', 'getfiles'),
(5, 'Admin', 'Ueditor', 'imageManager'),
(5, 'Admin', 'Ueditor', 'uploadimg'),
(5, 'Admin', 'ArticleClass', 'plug_displays'),
(5, 'Admin', 'ArticleClass', 'check_navigation'),
(5, 'Admin', 'ArticleClass', 'attribute_set'),
(5, 'Admin', 'ArticleClass', 'template_app'),
(5, 'Admin', 'ArticleClass', 'mark_red'),
(5, 'Admin', 'ArticleClass', 'down'),
(5, 'Admin', 'ArticleClass', 'move'),
(5, 'Admin', 'ArticleClass', 'edit'),
(5, 'Admin', 'ArticleClass', 'del'),
(5, 'Admin', 'ArticleClass', 'add'),
(5, 'Admin', 'Article', 'article_add'),
(5, 'Admin', 'ArticleClass', 'lists'),
(5, 'Admin', 'Navigation', 'upload'),
(5, 'Admin', 'Navigation', 'nav_down'),
(5, 'Admin', 'Navigation', 'nav_move'),
(5, 'Admin', 'Navigation', 'article_down'),
(5, 'Admin', 'Navigation', 'article_move'),
(5, 'Admin', 'Navigation', 'article_del'),
(5, 'Admin', 'Navigation', 'article_edit'),
(5, 'Admin', 'Navigation', 'article_lists'),
(5, 'Admin', 'Navigation', 'article_add'),
(5, 'Admin', 'Navigation', 'plug_displays'),
(5, 'Admin', 'Navigation', 'template_app'),
(5, 'Admin', 'Navigation', 'nav_attr'),
(5, 'Admin', 'Navigation', 'del'),
(5, 'Admin', 'Navigation', 'edit'),
(5, 'Admin', 'Navigation', 'add'),
(5, 'Admin', 'Navigation', 'lists'),
(5, 'Admin', 'Plug', 'plug_list'),
(5, 'Admin', 'Plug', 'displays_fetch'),
(5, 'Admin', 'Plug', 'displays'),
(5, 'Admin', 'Plug', 'div_app_edit'),
(5, 'Admin', 'Plug', 'plug_add'),
(5, 'Admin', 'Plug', 'del'),
(5, 'Admin', 'Plug', 'edit'),
(5, 'Admin', 'Plug', 'add'),
(5, 'Admin', 'Plug', 'lists'),
(5, 'Admin', 'Image', 'plug_displays'),
(5, 'Admin', 'Image', 'plug_edit'),
(5, 'Admin', 'Image', 'index'),
(5, 'Admin', 'Plug', 'default'),
(5, 'Admin', 'Setting', 'password_post'),
(5, 'Admin', 'Setting', 'password'),
(5, 'Admin', 'User', 'userinfo_post'),
(5, 'Admin', 'User', 'userinfo'),
(5, 'Admin', 'Setting', 'userdefault'),
(5, 'Admin', 'Setting', 'default'),
(3, 'Admin', 'User', 'add_post'),
(3, 'Admin', 'User', 'add'),
(3, 'Admin', 'User', 'edit_post'),
(3, 'Admin', 'User', 'edit'),
(3, 'Admin', 'User', 'delete'),
(3, 'Admin', 'User', 'index'),
(3, 'Admin', 'Rbac', 'member'),
(3, 'Admin', 'Rbac', 'index'),
(3, 'Member', 'Indexadmin', 'default3'),
(3, 'Member', 'Indexadmin', 'default'),
(3, 'Admin', 'Setting', 'password_post'),
(3, 'Admin', 'Setting', 'password'),
(3, 'Admin', 'User', 'userinfo_post'),
(3, 'Admin', 'User', 'userinfo'),
(4, 'Admin', 'Setting', 'default'),
(3, 'Admin', 'Setting', 'userdefault'),
(4, 'Admin', 'Layout', 'index'),
(3, 'Admin', 'Setting', 'default'),
(3, 'Admin', 'Menu', 'default'),
(3, 'Admin', 'Menu', 'index'),
(3, 'Admin', 'Menu', 'export_menu'),
(3, 'Admin', 'Menu', 'edit'),
(3, 'Admin', 'Menu', 'edit_post'),
(3, 'Admin', 'Menu', 'delete'),
(3, 'Admin', 'Menu', 'lists'),
(3, 'Admin', 'Menu', 'add'),
(3, 'Admin', 'Menu', 'add_post'),
(3, 'Admin', 'Menu', 'listorders');

-- --------------------------------------------------------

--
-- 表的结构 `sp_menu`
--

CREATE TABLE IF NOT EXISTS `sp_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父类ID',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL DEFAULT '' COMMENT '所属模块',
  `action` char(30) NOT NULL DEFAULT '' COMMENT '方法名',
  `data` char(50) NOT NULL DEFAULT '' COMMENT '参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1权限认证加菜单，0只作为菜单显示',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1显示0隐藏',
  `name` char(50) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `icon` char(50) DEFAULT NULL COMMENT '图标',
  `remark` char(255) NOT NULL DEFAULT '' COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID(DESC排序)',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `parentid` (`parentid`),
  KEY `model` (`model`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台菜单表' AUTO_INCREMENT=549 ;

--
-- 转存表中的数据 `sp_menu`
--

INSERT INTO `sp_menu` (`id`, `parentid`, `app`, `model`, `action`, `data`, `type`, `status`, `name`, `icon`, `remark`, `listorder`) VALUES
(239, 0, 'Admin', 'Setting', 'default', '', 0, 1, '设置', 'cogs', '', 0),
(252, 239, 'Admin', 'Setting', 'userdefault', '', 0, 1, '个人信息', '', '', 0),
(253, 252, 'Admin', 'User', 'userinfo', '', 1, 1, '修改信息', '', '', 0),
(254, 252, 'Admin', 'Setting', 'password', '', 1, 1, '修改密码', '', '', 0),
(286, 0, 'Member', 'Indexadmin', 'default', '', 1, 1, '用户管理', 'group', '', 0),
(290, 286, 'Member', 'Indexadmin', 'default3', '', 1, 1, '管理组', '', '', 0),
(291, 290, 'Admin', 'Rbac', 'index', '', 1, 1, '角色管理', '', '', 0),
(292, 290, 'Admin', 'User', 'index', '', 1, 1, '管理员', '', '', 0),
(293, 0, 'Admin', 'Menu', 'default', '', 1, 1, '菜单管理', 'list', '', 0),
(297, 293, 'Admin', 'Menu', 'index', '', 1, 1, '后台菜单', '', '', 0),
(480, 292, 'Admin', 'User', 'delete', '', 1, 0, '删除管理员', '', '', 1000),
(479, 292, 'Admin', 'User', 'edit', '', 1, 0, '编辑管理员', '', '', 1000),
(478, 292, 'Admin', 'User', 'add', '', 1, 0, '添加管理员', '', '', 1000),
(467, 291, 'Admin', 'Rbac', 'member', '', 1, 0, '成员管理', '', '', 1000),
(465, 291, 'Admin', 'Rbac', 'authorize', '', 1, 0, '权限设置', '', '', 1000),
(464, 291, 'Admin', 'Rbac', 'roleedit', '', 1, 0, '编辑角色', '', '', 1000),
(463, 291, 'Admin', 'Rbac', 'roledelete', '', 1, 1, '删除角色', '', '', 1000),
(462, 291, 'Admin', 'Rbac', 'roleadd', '', 1, 1, '添加角色', '', '', 1000),
(436, 297, 'Admin', 'Menu', 'export_menu', '', 1, 0, '菜单备份', '', '', 1000),
(434, 297, 'Admin', 'Menu', 'edit', '', 1, 0, '编辑菜单', '', '', 1000),
(433, 297, 'Admin', 'Menu', 'delete', '', 1, 0, '删除菜单', '', '', 1000),
(432, 297, 'Admin', 'Menu', 'lists', '', 1, 0, '所有菜单', '', '', 1000),
(483, 287, 'Member', 'Indexadmin', 'delete', '', 1, 0, '删除用户', '', '', 1000),
(501, 536, 'Admin', 'Menu', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(502, 434, 'Admin', 'Menu', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(511, 462, 'Admin', 'Rbac', 'roleadd_post', '', 1, 0, '提交添加', '', '', 0),
(512, 464, 'Admin', 'Rbac', 'roleedit_post', '', 1, 0, '提交编辑', '', '', 0),
(513, 465, 'Admin', 'Rbac', 'authorize_post', '', 1, 0, '提交设置', '', '', 0),
(514, 284, 'Admin', 'Setting', 'site_post', '', 1, 0, '提交修改', '', '', 0),
(515, 254, 'Admin', 'Setting', 'password_post', '', 1, 0, '提交修改', '', '', 0),
(522, 478, 'Admin', 'User', 'add_post', '', 1, 0, '提交保存', '', '', 0),
(523, 479, 'Admin', 'User', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(524, 253, 'Admin', 'User', 'userinfo_post', '', 1, 0, '提交修改', '', '', 0),
(536, 297, 'Admin', 'Menu', 'add', '', 1, 0, '添加菜单', '', '', 0),
(548, 297, 'Admin', 'Menu', 'listorders', '', 1, 0, '后台菜单排序', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_role`
--

CREATE TABLE IF NOT EXISTS `sp_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '角色名称' COMMENT '角色名称',
  `pid` smallint(6) NOT NULL DEFAULT '0' COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态1开启0禁止',
  `remark` varchar(255) DEFAULT NULL COMMENT '角色描述',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段(DESC排序)',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员角色表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `sp_role`
--

INSERT INTO `sp_role` (`id`, `name`, `pid`, `status`, `remark`, `create_time`, `update_time`, `listorder`) VALUES
(3, '超级管理员', 0, 1, '拥有网站所有功能', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_users`
--

CREATE TABLE IF NOT EXISTS `sp_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `school_id` int(11) NOT NULL DEFAULT '0' COMMENT '学校ID',
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '登录名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员昵称',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录IP',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '状态(0关闭，1开启)',
  `role_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '角色ID关联role表ID(-1超级管理员，0未添加角色)',
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `role_id` (`role_id`),
  KEY `user_login` (`user_login`),
  KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台管理员' AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `sp_users`
--

INSERT INTO `sp_users` (`id`, `school_id`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `last_login_ip`, `last_login_time`, `create_time`, `user_activation_key`, `user_status`, `role_id`) VALUES
(1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', '超级管理员', 'admin@163.com', '127.0.0.1', '2017-06-09 13:54:47', '2014-07-18 08:53:31', '', 1, -1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
