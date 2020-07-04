CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
	  { name: 'styles', groups: [ 'styles' ] },
	  { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
	  { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
	  { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
	  { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
	  { name: 'forms', groups: [ 'forms' ] },
	  { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
	  { name: 'links', groups: [ 'links' ] },
	  { name: 'insert', groups: [ 'insert' ] },
	  { name: 'tools', groups: [ 'tools' ] },
	  '/',
	  '/',
	  { name: 'colors', groups: [ 'colors' ] },
	  { name: 'others', groups: [ 'others' ] },
	  { name: 'about', groups: [ 'about' ] }
	];
  
	config.removeButtons = 'Source,Save,NewPage,Templates,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,RemoveFormat,CopyFormatting,Replace,Find,SelectAll,Scayt,Outdent,Blockquote,CreateDiv,BidiRtl,Language,Indent,BidiLtr,Anchor,JustifyBlock,JustifyRight,JustifyCenter,JustifyLeft,Flash,HorizontalRule,Table,Smiley,SpecialChar,PageBreak,Iframe,Font,FontSize,TextColor,BGColor,ShowBlocks,About,Undo,Redo';
  };
