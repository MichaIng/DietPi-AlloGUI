/*
 * GScroll v0.2.4
 * 
 * https://github.com/gesanchez/GScroll
 *
 * Copyright (c) 2014 German Sanchez
 * Licensed under the MIT license.
 *
 */

;(function ( $, window, document, undefined ) {

    var pluginName = "GScroll",
        defaults = {
            width: "100%",
            height: "150px"
        };

    function Plugin( element, options ) {
        this.element = element;
        this.options = $.extend( {}, defaults, options) ;
        this.init();
    }

    Plugin.prototype = {

        init: function() {
            var self = this;
            self.node = $(self.element);
            self.node.wrap('<div class="GScroll" style="width:'+ self.options.width +';height:'+ self.options.height +'"></div>')
            .wrap('<div class="GScroll-scrollable"></div>')
            .parent().after('<div class="GScroll-bar"></div>');
            
            self.container = self.node.closest('.GScroll');
            self.scrollable = self.node.parent();
            self.bar = self.node.parent().next();
            
            self.adjust.call(self);
            self.events.call(self);
        },
        
        /**
        *
        * Method for adjust bar height
        */
        adjust: function(callback) {
            var self = this;
            
            self.conHeight = self.container.height();
            self.scrollHeight = 0;
            
            if (self.node.is(':not(:visible)')){
                var clone = self.node.clone();
                clone.css({
                    width: self.options.width,
                    'visibility' : 'hidden'
                }).removeAttr('id').show();
                $('body').append(clone);
                self.scrollHeight = clone.outerHeight();
                clone.remove();
                
            }else{
                
                self.scrollHeight = self.scrollable.outerHeight();
            }
            self.barHeight = Math.max(20,(self.conHeight - Math.abs(self.conHeight - self.scrollHeight)));
            
            self.bar.css('height',self.barHeight + 'px');
            
            if (callback){
                callback.call(self);
            }
        },
        
        events: function(){
            var self = this;
            self.dragActive = false;
            self.y = 0;
            /**
            * Added event to container
            */
           
            self.container.on({
                'DOMMouseScroll mousewheel' : function(e){
                    var o = e.originalEvent,
                        delta = (o.detail < 0 || o.wheelDelta > 0) ? 1 : -1;
                
                    self.wheel.call(self, delta);
            
                    return false;
                },
                'mouseenter' : function(){
                    if (self.scrollHeight > self.conHeight){
                        self.bar.stop(true,true).fadeIn();
                    }
                },
                'mouseleave' : function(){
                    self.bar.stop(true,true).fadeOut();
                    self.dragActive = false;
                },
                'mousemove' : function(e){
                    e.preventDefault();
                    self.drag.call(self, e);
                },
                'mouseup' : function(e){
                    self.dragActive = false;
                },
                'focusin' : function(e){
                    if ($(e.target).is('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex], *[contenteditable]') === true){
                        self.onFocusIn.call(self, e);
                    }
                }
            });
            
            /**
            * Added event for scroll bar
            */
            self.bar.on({
                'mousedown' : function(e){
                    e.preventDefault();
                    self.dragActive = true;
                    self.y = e.pageY;
                },
                'mouseup' : function(e){
                    self.dragActive = false;
                },
                'mousemove' : function(e){
                    e.preventDefault();
                    self.drag.call(self, e);
                }
            });
            
            /**
            * Added event to element
            */
            self.node.on('adjust.' + pluginName, function(){
                self.adjust.call(self, function(){
                    self.onResize.call(self);
                });    
                
            }).on('destroy.' + pluginName, function(){
                $.removeData(self.element, 'plugin_' + pluginName);
                self.node.off('.' + pluginName);
                self.node.unwrap().unwrap();
                self.bar.remove();
                self.element = null;
                self = null;
            });
            
            
            $(window).on('adjust.' + pluginName, function(){
                self.adjust.call(self, function(){
                    self.onResize.call(self);
                });  
            });
        },
        /* Method for move bar and scrollable on mousewheel event */
        wheel: function(delta){
            var self = this,
                maxTop = self.conHeight - self.barHeight,
                maxScrollBottom = self.conHeight - self.scrollHeight,
                top = Math.abs(maxTop / (Math.abs(maxScrollBottom)) * 15);
            
            if (delta > 0){
                                
                self.bar.css({
                    'top' : Math.max(0, parseFloat(self.bar.css('top')) - top)
                });
                
            }else if (delta < 0){
                
                self.bar.css({
                    'top' : Math.min(maxTop, parseFloat(self.bar.css('top')) + top)
                });
                
            }
            
            self.scrollable.css({
                'top' : Math.min(0 ,Math.max(maxScrollBottom, (maxScrollBottom / maxTop) * parseFloat(self.bar.css('top'))))
            });
        },
        /**
        * Method for move bar and scrollable when bar is dragged
        */
        drag : function(e){
            var self = this,
                maxTop = self.conHeight - self.barHeight,
                maxScrollBottom = self.conHeight - self.scrollHeight;
            
            if (self.dragActive === true){
                
                var top = parseFloat(self.bar.position().top) + e.pageY - self.y;
                top = Math.min(top, maxTop); 
                
                self.bar.css({
                    top: Math.max(0 ,top) + 'px'            
                });
                
                self.scrollable.css({
                    'top' : Math.min(0 ,Math.max(maxScrollBottom, (maxScrollBottom / maxTop) * top))
                });
                
                self.y = e.pageY;
            }
        },
        onResize : function(){
            var self = this,
                scrollable_top = Math.abs(parseFloat(self.scrollable.css('top'))),
                bar_top = parseFloat(self.bar.css('top')),
                maxScrollBottom = Math.abs(self.conHeight - self.scrollHeight),
                maxTop = self.conHeight - self.barHeight,
                top = (maxScrollBottom / maxTop) * bar_top;
            
            if (self.scrollHeight < self.conHeight){
                self.bar.hide();
            }
            
            if (scrollable_top > maxScrollBottom){
                self.scrollable.css({
                    'top' : -maxScrollBottom
                });
            }
            
            var div = top / bar_top,
                newTop = (top - scrollable_top) / div;
                        
            self.bar.css({
                'top': Math.min(maxTop, Math.max(0, bar_top - newTop))
            });   
        },
        onFocusIn : function(e){

            var self = this,
                target = $(e.target),
                target_top = target.position().top - $(window).scrollTop(),
                maxTop = self.conHeight - self.barHeight,
                maxScrollBottom = self.conHeight - self.scrollHeight,
                top = Math.min(maxTop, Math.max(0,(maxTop * target_top) / Math.abs(maxScrollBottom))),
                scrollableTop = (maxScrollBottom / maxTop) * top,
                delimterA = Math.abs(parseFloat(self.scrollable.css('top'))),
                delimterB = Math.abs(parseFloat(self.scrollable.css('top'))) + self.conHeight;
            
            if (target_top + target.outerHeight() < delimterA || target_top + target.outerHeight() > delimterB){
        
                self.bar.css({
                    'top': top
                }, 200);

                self.scrollable.css({
                    'top' : Math.min(0 ,Math.max(maxScrollBottom, scrollableTop))
                },200);
            }
        }
    };

    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                new Plugin( this, options ));
            }
        });
    };

})( jQuery, window, document );