// Let's enjoy Canvasina !

//sun : circle(x,y, radius);
circle(0,0,300);
fill(orange);

//roof : tri(x1,y1, x2,y2, x3,y3);
tri(250,150, 155,270, 345,270);
fill(blue);

//room : box(x,y, width,height)
color(red);
box(190,270,120,130); 

//window
color(white);
box(220,290,65,65);

//earth
color(green);
box(0,390,500,150);

//text : str("Your message", x,y, fontSize, fontFamily)
color(blue);
str("Hello, Canvasina!",10,110,50,serif);
