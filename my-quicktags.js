QTags.addButton( '<', '<', '&lt;', '' ); //快捷输入<的html代码
QTags.addButton( '>', '>', '&gt;', '' );
QTags.addButton( 'hr', 'hr', "\n<hr />\n", '' );  //快捷输入一个hr横线，点一下即可
QTags.addButton( 'h1', 'h1', "\n<h1>", "</h1>\n" );  //快捷输入h1标签
QTags.addButton( 'h2', 'h2', "\n<h2>", "</h2>\n" );
QTags.addButton( 'reply', '回复可见', "\n<reply>", "</reply>\n" );
//QTags.addButton( 'my_id', 'my button', '\n</span>', '</span>\n' );  
//这儿共有四对引号，分别是按钮的ID、显示名、点一下输入内容、再点一下关闭内容（此为空则一次输入全部内容），\n表示换行。