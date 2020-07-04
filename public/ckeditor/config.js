/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		'/',
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.height = 300;

	config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Replace,Cut,Undo,Find,SelectAll,Scayt,PasteFromWord,PasteText,Paste,Copy,Redo,Form,Checkbox,Radio,TextField,Textarea,Button,ImageButton,HiddenField,Select,Superscript,Subscript,Strike,CopyFormatting,RemoveFormat,Indent,Outdent,Blockquote,JustifyCenter,CreateDiv,JustifyRight,JustifyBlock,JustifyLeft,BidiLtr,BidiRtl,Language,Anchor,Table,Flash,Smiley,SpecialChar,PageBreak,Iframe,HorizontalRule,Image,BGColor,ShowBlocks,Maximize,TextColor,About,Font,FontSize';
};	
