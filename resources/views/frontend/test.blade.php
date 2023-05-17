<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ma galerie FlexMasonry</title>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style type="text/css">

.container {
  padding: 40px 5%;
}

.heading-text {
  margin-bottom: 2rem;
  font-size: 2rem;
}

.heading-text span {
  font-weight: 100;
}

ul {
  list-style: none;
}

/* Responsive image gallery rules begin*/

.image-gallery {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.image-gallery > li {
  flex: 1 1 auto; /* or flex: auto; */
  height: 300px;
  cursor: pointer;
  position: relative;
}

.image-gallery::after {
  content: "";
  flex-grow: 999;
}

.image-gallery li img {
  object-fit: cover;
  width: 100%;
  height: 100%;
  vertical-align: middle;
  border-radius: 5px;
}

.overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  background: rgba(57, 57, 57, 0.502);
  top: 0;
  left: 0;
  transform: scale(0);
  transition: all 0.2s 0.1s ease-in-out;
  color: #fff;
  border-radius: 5px;
  /* center overlay content */
  display: flex;
  align-items: center;
  justify-content: center;
}

/* hover */
.image-gallery li:hover .overlay {
  transform: scale(1);
}

     
     
</style>

</head>
<body>

<div class="container" > 
<h2 class="heading-text">Responsive <span>image gallery</span></h2>
<!-- header text --> 
<ul class="image-gallery"> 
                    
                    
                    <li> 
                 
                            <img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-645cbba43c621_1___DSC8392-geysir-2.jpg" class="mainimg" alt=" "> 
                              <div class="overlay"> 
                                <span> Titre de l'image </span>
                            </div>
                    
                    </li> 
                    
                    
                    <li> 
                    
                            <img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-645cbba43c621_1___DSC8391-geysir-3.jpg" class="mainimg" alt=" "> 
                             <div class="overlay"> 
                                <span> Titre de l'image </span>
                            </div>
                   
                    </li> 
                    
                    
                    <li> 
                     
                            <img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-645cbbab7df32_1___DSC8393-geysir-1.jpg" class="mainimg" alt=" "> 
                             <div class="overlay"> 
                                <span> Titre de l'image </span>
                            </div>
                     
                    </li> 
                    
                    
                    <li> 
                       
                            <img src="https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-645cbbac6c8f8_1___DSC8364-geysir-4.jpg" class="mainimg" alt=" "> 
                             <div class="overlay"> 
                                <span> Titre de l'image </span>
                            </div>
                        
                    </li> 
                    
    </ul>


<ul class = "image-gallery" > 
     <li > 
        <img src = "https://images.unsplash.com/photo-1684122561380-3772a4f9e388?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=800&q=60" alt = " " /> 
        <div class = "overlay" > 
            <span > Titre de l'image </span >
        </div >
    </li > 
    <li > 
        <img src = "https://images.unsplash.com/photo-1683009427479-c7e36bbb7bca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxMXx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt = " " /> 
        <div class = "overlay" > 
            <span > Titre de l'image </span >
        </div >
    </li > 
    <li > 
        <img src = "https://images.unsplash.com/photo-1684230413575-f83bf3acddb7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNXx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt = " " /> 
        <div class = "overlay" > 
            <span > Titre de l'image </span >
        </div >
    </li > 
    <li > 
        <img src = "https://images.unsplash.com/photo-1684093024930-30262615211b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyOXx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt = " " /> 
        <div class = "overlay" > 
            <span > Titre de l'image </span >
        </div >
    </li > 
    <li > 
        <img src = "https://plus.unsplash.com/premium_photo-1671485196355-32005a27fd02?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1M3x8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=60" alt = " " /> 
        <div class = "overlay" > 
            <span > Titre de l'image </span >
        </div >
    </li > 
    <li > 
        <img src = "https://mysecretmap.s3.eu-central-1.wasabisys.com/medium/medium-6457c137b9601_1___DSC8281-header.jpg" alt = " " /> 
        <div class = "overlay" > 
            <span > Titre de l'image </span >
        </div >
    </li > 
 </ul> 
  


 <div >

<script>

    

</script>

</body>
</html>
