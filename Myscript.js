    //selecting our node
        var MyNode = document.querySelector(".pixgrid div");
        MyNode.addEventListener("click", function (e) { //click image
            if (e.target.tagName === "IMG") {
                var myOverlay = document.createElement('div');
                myOverlay.id = 'overlay';
                document.body.appendChild(myOverlay);
                // set up overlay styles
                myOverlay.style.position = 'absolute';
                myOverlay.style.top = 0;
                myOverlay.style.backgroundColor = 'rgba(0,0,0,0.7)';
                myOverlay.style.cursor = 'pointer';
                // resize and position overlay
                myOverlay.style.width = window.innerWidth + 'px';
                myOverlay.style.height = window.innerHeight + 'px';
                myOverlay.style.top = window.innerYOffset + 'px';
                myOverlay.style.left = window.innerXOffset + 'px';
                // add image  

                var imageSrc = e.target.src;
                var largeImage = document.createElement('img');
                largeImage.id = 'largeImage';
                largeImage.src = imageSrc.substr(0, imageSrc.length);
                var block = largeImage.style.display = 'block';
                largeImage.style.position = 'absolute';

                //wait until the image have loaded
                largeImage.addEventListener('load', function () {
                    //Resize if taller 
                    if (this.height > window.innerHeight) {
                        this.ratio = window.innerHeight / this.height;
                        this.height = this.height * this.ratio;
                        this.width = this.width * this.ratio;
                    }
                    //Resize if wider
                    if (this.width < window.innerWidth) {
                        this.ratio = window.innerHeight / this.height;
                        this.height = this.height * this.ratio;
                        this.width = this.width * this.ratio;

                    }
                    centerImage(this);
                    myOverlay.appendChild(largeImage);

                });
                // return the image  to his position
                myOverlay.addEventListener('click', function () {
                    if (myOverlay) {
                        window.removeEventListener('scroll', window, false);
                        window.removeEventListener('resize', window, false)
                        myOverlay.parentNode.removeChild(myOverlay);
                    }
                }, false);
                // resize the block when scroll
                window.addEventListener('scroll', function () {
                    if (myOverlay) {
                        myOverlay.style.top = window.pageYOffset + 'px';
                        myOverlay.style.left = window.pageXOffset + 'px';
                    }
                });
                // resize the block when resize the window
                window.addEventListener('resize', function () {
                    if (myOverlay) {
                        myOverlay.style.width = window.innerWidth + 'px';
                        myOverlay.style.height = window.innerHeight + 'px';
                        myOverlay.style.top = window.innerYOffset + 'px';
                        myOverlay.style.left = window.innerXOffset + 'px';
                        centerImage(largeImage);
                    }

                }, false);


            } //target is an image

        }, false);
        function centerImage(theImage) {
            var myDifx = (window.innerWidth - theImage.width) / 2;
            var myDify = (window.innerHeight - theImage.height) / 2;
            theImage.style.top = myDify + 'px';
            theImage.style.left = myDifx + 'px';
            return theImage;
        }