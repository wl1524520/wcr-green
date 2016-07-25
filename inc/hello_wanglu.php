<?php
/**
 * @package Hello_Wanglu
 * @version 1.6
 */
/*
Plugin Name: Hello Dolly
Plugin URI: https://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.6
Author URI: http://ma.tt/
*/

//function hello_wanglu_get_lyric() {
function hello_wanglu() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "既不回头，何必不忘；既然无缘，何须誓言；今日种种，似水无痕；明夕何夕，君已陌路。
我一直以为人是慢慢变老的，其实不是，人是一瞬间变老的。
如果你都不知道自己想去哪里，那去哪里都是一样的。
我能够允许你逃避过去，不过至少从现在或者明天开始都不要再逃避。
有些人，一旦遇见，便一眼万年；有些心动，一旦开始，便覆水难收。
廉价的自尊、粗劣的傲气，无论哪个后生小辈都很重视这些东西。
无论是丢下还是被丢下，都是一样痛苦的。
生活就像超级女生，走到最后的都是纯爷们。
人不能一个人活下去，不需要任何人的孤独和需要人但得不到的孤独是不一样的。
我的眼睛，就是为了寻找你而存在的。
愿有人待你如初，疼你入骨，从此深情不被辜负。
跟谁在一起舒服就和谁在一起，包括朋友、亲人也是，累了就躲远一点。取悦别人远不如快乐自己！
人，宁可孤独，也不违心；宁可抱憾，也不将就。
能入我心者，我待以君王；不入我心者，不屑以敷衍！
谎言不一定是谎言，被发现的谎言，才算是谎言。
喜欢上你，爱上你，真是太好了，谢谢。
我愿意给你自己所有的快乐，你愿意分担我一半的难过吗？
我不渴望什么在别的城市迎来的春天，只要和你在一起的春天就好，只要和你在一起就好⋯⋯
也许世界上也有五千朵和你一模一样的花，但只有你是我独一无二的玫瑰。
长大了你就知道，你得积攒足够的底气，才能过上简单、安逸、自由的生活。
你必须非常努力，才能看起来毫不费力。
得罪几个人，做糟糕几件事，其实没那么可怕。一辈子活得委曲求全，战战兢兢，才最可怕。
年纪越大，越会发现社交的种种不堪，所以，踏实的掌握一门生存的技能，认真发展一个独处的爱好，永远都不会错。
最伤人的就是，昨天还让你觉得自己意义非凡的人，今天就让你觉得自己可有可无。
如果不去遍历世界，我们就不知道什么是我们精神和情感的寄托，但我们一旦遍历了世界，却发现我们再也无法回到那美好的地方去了。
当我们开始寻求，我们就已经失去，而我们不开始寻求，我们根本无法知道自己身边的一切是如此可贵。
如果一段关系总是让你感觉很累，那一定有什么地方错了。无论友情还是爱情。
一个人厚着脸皮没羞没臊地去爱另一个人的概率一生只有一次。
也许一个人要走很长的路，经历过生命中无数突如其来的繁华和苍凉才会变得成熟。
大概每个人都会遇到一个不能在一起的人，爱而不得，回忆重重。
生活中只有一种英雄主义，那就是在认清生活的真相之后依然热爱生活。
长大的一个坏处是，深信不疑的东西越来越少了。好处是，越来越不需要对一些东西深信不疑了。
愿你 此后做的每一个选择都是为了自己；愿你 每天那么忙做的都是自己喜欢的；愿你 将来的婚姻 真的是因为爱情；愿你 少一些何必当初，多一些暗自庆幸。愿你 以后的所有泪水都是喜极而泣。
人生就是一列开往坟墓的列车，路途上会有很多站，很难有人可以自始至终陪着走完。当陪你的人要下车时，即使不舍也该心存感激，然后挥手道别。
不管你曾经被伤害得有多深，总会有一个人的出现，让你原谅之前生活对你所有的刁难。
人永远不知道，谁哪次不经意的跟你说了再见之后，就真的不会再见了。
世界这么大，人生这么长，总会有这么一个人，让你想要温柔的对待。
一举一动，都是承诺，会被另一个人看在眼里，记在心上的。
他喜欢她，无关爱情。她幸福了，于是他也幸福了。
有些烦恼，丢掉了，才有云淡风轻的机会。
一旦你驯服了什么，就要对她负责，永远的负责。
不知道你能不能明白生命叫做孤独，我就是这样，孤独地生活着，没有一个人真正跟我谈得来。
缺月挂疏桐，漏断人初静。谁见幽人独往来，缥缈孤鸿影。惊起却回头，有恨无人省。拣尽寒枝不肯栖，寂寞沙洲冷。
当朋友是不需要什么资格的。";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
/*
function hello_wanglu() {
    $notice = "<b>欢迎来到戊辰人博客</b><br>";
	$chosen = hello_wanglu_get_lyric();
	echo "<p id='hello-wanglu'>$notice$chosen</p>";
}
 */
