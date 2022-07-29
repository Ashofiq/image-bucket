

## Image Bucket Service

Image Bucket Service is a service that provides object storage through a web service interface. Image Bucket uses the same scalable storage infrastructure. Image Bucket can store Only Image type of object, which allows uses like storage for Internet applications. 


## Documentation

## Uploader Image
    - only Four type of image extention are allow, If you are use other extention, go to App\Helper\Helper.php and Edit supportImageExtention() funtion and add your extention.
    ![Image extention](public/readme/image%20extention.PNG)

    - If your image store are different directory, go to App\Helper\Helper.php and Edit supportedImagePathType() and add your directory path. 
    ![Image extention](public/readme/image_directory.PNG)

## uploading 
    - http://127.0.0.1:8000/uploader
    - body:  {image: base64 image}

## get Image 
    - http://127.0.0.1:4000/p/product/image_name.PNG
    - if you are specific size of image, you can size pass by url _100x100.png
    - http://127.0.0.1:4000/p/product/image_name.PNG_100x100.png

    