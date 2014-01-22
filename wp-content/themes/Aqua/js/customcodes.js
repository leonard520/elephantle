(function() {  
    tinymce.create('tinymce.plugins.button', {  
        init : function(ed, url) {  
            ed.addButton('button', {  
                title : 'Add a Button Link',  
                image : url+'/../images/shortcode_icons/button_link.png',  
                onclick : function() {  
                     ed.selection.setContent('[button href="" target="" css_classes="e.g. button_hilite button_pale sm_button"]' + ed.selection.getContent() + '[/button]');  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('button', tinymce.plugins.button);  
})();  

(function() {  
	tinymce.create('tinymce.plugins.checklist', {  
		init : function(ed, url) {  
		ed.addButton('checklist', {  
			title : 'Add a Check List',  
			image : url+'/../images/shortcode_icons/ul.png',  
			onclick : function() {
				ed.selection.setContent('[checklist arrows="no"]<ul class="checked">\r<li>List Item #1</li>\r<li>List Item #2</li>\r<li>List Item #3</li>\r</ul>[/checklist]');
			}
		});
	},
	createControl : function(n, cm) {
		return null;
	},
	});
	tinymce.PluginManager.add('checklist', tinymce.plugins.checklist);
})();

(function() {  
	tinymce.create('tinymce.plugins.border', {  
		init : function(ed, url) {  
		ed.addButton('border', {  
			title : 'Add a Border',  
			image : url+'/../images/shortcode_icons/border.png',  
			onclick : function() {
				ed.selection.setContent('[border margin="no"][/border]');
			}
		});
	},
	createControl : function(n, cm) {
		return null;
	},
	});
	tinymce.PluginManager.add('border', tinymce.plugins.border);
})();


(function() {  
	tinymce.create('tinymce.plugins.big_title', {  
		init : function(ed, url) {  
			ed.addButton('big_title', {  
				title : 'Add a Big Title Section',  
				image : url+'/../images/shortcode_icons/big_title.png',  
				onclick : function() {
					ed.selection.setContent('[big_title][border margin="no"][/border]<h1>Sometimes I worry about <strong>being a success</strong> in a mediocre world</h1><h2>The richest man is not the one who has the most, but the one who needs the least...</h2>[button href="#" target="_blank"]Continue[/button]&nbsp;&nbsp;[button href="#" css_classes="button_hilite"]Portfolio[/button][/big_title]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('big_title', tinymce.plugins.big_title);
})();


(function() {  
	tinymce.create('tinymce.plugins.feat_text', {  
		init : function(ed, url) {  
			ed.addButton('feat_text', {  
				title : 'Add Iconed Featured Text Section',  
				image : url+'/../images/shortcode_icons/feat_text.png',  
				onclick : function() {
					ed.selection.setContent('[feat_text title="Featured Title" icon="eg. screen, cog, profile etc."]Featured Text[/feat_text]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('feat_text', tinymce.plugins.feat_text);
})();


(function() {  
	tinymce.create('tinymce.plugins.table', {  
		init : function(ed, url) {  
			ed.addButton('table', {  
				title : 'Add a Table (Aqua-style)',  
				image : url+'/../images/shortcode_icons/table.png',  
				onclick : function() {
					ed.selection.setContent('<table class="aqua_table"><tr><th>Header 1</th><th>Header 2</th><th>Header 3</th></tr><tr><td>Item 1</td><td>Description of Item 1</td><td>$200</td></tr><tr><td>Item 2</td><td>Description of Item 2</td><td>$300</td></tr></table>');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('table', tinymce.plugins.table);
})();


(function() {  
	tinymce.create('tinymce.plugins.highlight', {  
		init : function(ed, url) {  
		ed.addButton('highlight', {  
			title : 'Add a Text HighLight',  
			image : url+'/../images/shortcode_icons/highlight.png',  
			onclick : function() {
			ed.selection.setContent('[highlight dark="no"]' + ed.selection.getContent() + '[/highlight]');
		}
		});
	},
	createControl : function(n, cm) {
		return null;
	},
	});
	tinymce.PluginManager.add('highlight', tinymce.plugins.highlight);
})();


(function() {  
	tinymce.create('tinymce.plugins.tooltip', {  
		init : function(ed, url) {  
			ed.addButton('tooltip', {  
				title : 'Add a Text Tooltip',  
				image : url+'/../images/shortcode_icons/tooltip.png',  
				onclick : function() {
					ed.selection.setContent('[tooltip title="Tooltip Text"]' + ed.selection.getContent() + '[/tooltip]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('tooltip', tinymce.plugins.tooltip);
})();


(function() {  
	tinymce.create('tinymce.plugins.heading', {  
		init : function(ed, url) {  
			ed.addButton('heading', {  
				title : 'Add an Aqua-style Heading',  
				image : url+'/../images/shortcode_icons/heading.png',  
				onclick : function() {
					ed.selection.setContent('[heading]' + ed.selection.getContent() + '[/heading]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('heading', tinymce.plugins.heading);
})();


(function() {  
	tinymce.create('tinymce.plugins.message', {  
		init : function(ed, url) {  
			ed.addButton('message', {  
				title : 'Add a Message box',  
				image : url+'/../images/shortcode_icons/message.png',  
				onclick : function() {
					ed.selection.setContent('[message type="e.g. information, success, attention, warning"]Message Text...[/message]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('message', tinymce.plugins.message);
})();


(function() {  
	tinymce.create('tinymce.plugins.accordion', {  
		init : function(ed, url) {  
		ed.addButton('accordion', {  
			title : 'Add an Accordion',  
			image : url+'/../images/shortcode_icons/accordion.png',  
			onclick : function() {
				ed.selection.setContent('[accordion title="" is_open="no"]...[/accordion]');
			}
		});
	},
	createControl : function(n, cm) {
		return null;
	},
	});
	tinymce.PluginManager.add('accordion', tinymce.plugins.accordion);
})();



(function() {  
	tinymce.create('tinymce.plugins.tabs', {  
		init : function(ed, url) {  
			ed.addButton('tabs', {  
				title : 'Add Tabs',  
				image : url+'/../images/shortcode_icons/tabs.png',  
				onclick : function() {
					ed.selection.setContent('[tabs tab1="Tab 1" tab2="Tab 2" tab3="Tab 3"][tab id=1]Tab content 1[/tab][tab id=2]Tab content 2[/tab][tab id=3]Tab content 3[/tab][/tabs]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('tabs', tinymce.plugins.tabs);
})();


(function() {  
	tinymce.create('tinymce.plugins.column_row', {
	  createControl: function(n, cm) {
        switch (n) {

            case 'column_row':
                var mlb = cm.createListBox('column_row', {
                    title : 'Add Column Row',
                    onselect : function(v) {
                    	tinyMCE.activeEditor.execCommand('mceInsertContent', false, v);
                    //	tinyMCE.activeEditor.windowManager.alert('Value selected:' + v);
                    }
                });
                // Add some values to the list box
                mlb.add('1/3 + 2/3', '[column width="1/3" position="first" ] [/column] [column width="2/3" position="last" ] [/column] ');
                mlb.add('1/3 + 1/3 + 1/3 ', '[column width="1/3" position="first" ] [/column] [column width="1/3" position="none" ] [/column] [column width="1/3" position="last" ] [/column] ');
                mlb.add('1/2 + 1/2', '[column width="eight" position="first" ] [/column] [column width="eight" position="last" ] [/column] ');
                mlb.add('1/4 + 3/4', '[column width="four" position="first" ] [/column] [column width="twelve" position="last" ] [/column] ');
                
            // Return the new listbox instance
            return mlb;
        }
        return null;
    }
	});
	tinymce.PluginManager.add('column_row', tinymce.plugins.column_row);
})();




(function() {  
	tinymce.create('tinymce.plugins.column', {  
		init : function(ed, url) {  
		ed.addButton('column', {  
			title : 'Add a Column',  
			image : url+'/../images/shortcode_icons/column.png',  
			onclick : function() {
				ed.selection.setContent('[column width="" position=""]...[/column]');
			}
		});
	},
	createControl : function(n, cm) {
		return null;
	},
	});
	tinymce.PluginManager.add('column', tinymce.plugins.column);
})();


(function() {  
	tinymce.create('tinymce.plugins.testimonials', {  
		init : function(ed, url) {  
			ed.addButton('testimonials', {  
				title : 'Add Testimonials Carousel',  
				image : url+'/../images/shortcode_icons/testimonials.png',  
				onclick : function() {
					ed.selection.setContent('[testimonials heading="Testimonials" auto_scroll="yes"][testimonial width="1/2" author="Author Name #1" author_title="Author Title #1"]Testimonial Content #1[/testimonial][testimonial width="1/2" author="Author Name #2" author_title="Author Title #2"]Testimonial Content #2[/testimonial][/testimonials]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('testimonials', tinymce.plugins.testimonials);
})();


(function() {  
 tinymce.create('tinymce.plugins.youtube', {  
     init : function(ed, url) {  
         ed.addButton('youtube', {  
             title : 'Add a Youtube video',  
			 image : url+'/../images/shortcode_icons/youtube.png', 
             onclick : function() {  
                  ed.selection.setContent('[youtube id="Enter video ID (eg. Wq4Y7ztznKc)" width="600" height="350"]');  

             }  
         });  
     },  
     createControl : function(n, cm) {  
         return null;  
     },  
 });  
 tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);  
})();


(function() {  
 tinymce.create('tinymce.plugins.vimeo', {  
     init : function(ed, url) {  
         ed.addButton('vimeo', {  
             title : 'Add a Vimeo video',  
             image : url+'/../images/shortcode_icons/vimeo.png', 
             onclick : function() {  
                  ed.selection.setContent('[vimeo id="Enter video ID (eg. 10145153)" width="600" height="350"]');  

             }  
         });  
     },  
     createControl : function(n, cm) {  
         return null;  
     },  
 });  
 tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);  
})();

(function() {  
    tinymce.create('tinymce.plugins.slider', {  
        init : function(ed, url) {  
            ed.addButton('slider', {  
                title : 'Add an Image Slider',  
                image : url+'/../images/shortcode_icons/slider.png',  
                onclick : function() {  
                     ed.selection.setContent('[slider][slide link="" title=""]image url[/slide][slide link="" title=""]image url[/slide][/slider]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('slider', tinymce.plugins.slider);  
})();


(function() {
	tinymce.create('tinymce.plugins.posts_carousel', {
		init : function(ed, url) {
			ed.addButton('posts_carousel', {
				title : 'Add a Post Items Carousel',  
				image : url+'/../images/shortcode_icons/carousel.png',  
				onclick : function() {
					ed.selection.setContent('[posts_carousel heading="Latest Posts" post_type="post" order_by="date" order="DESC" limit="10" meta="yes" excerpt="yes" excerpt_char_limit="64" exclude_current="yes" width="four columns" scroll_by="4"][/posts_carousel]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
	});
	tinymce.PluginManager.add('posts_carousel', tinymce.plugins.posts_carousel);
})();

(function() {  
    tinymce.create('tinymce.plugins.person', {  
        init : function(ed, url) {  
            ed.addButton('person', {  
                title : 'Add a Person',  
                image : url+'/../images/shortcode_icons/person.png',  
                onclick : function() {  
                     ed.selection.setContent('[person name="John Doe" picture_url="" title="Developer"][/person]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('person', tinymce.plugins.person);  
})();

(function() {  
	tinymce.create('tinymce.plugins.portfolio_carousel', {  
		init : function(ed, url) {  
		ed.addButton('portfolio_carousel', {  
			title : 'Add a Portfolio Items Carousel',  
			image : url+'/../images/shortcode_icons/portfolio.png',  
			onclick : function() {  
			ed.selection.setContent('[portfolio_carousel limit="10" order_by="rand"][/portfolio_carousel]');  
			
		}  
		});  
	},  
	createControl : function(n, cm) {  
		return null;  
	},  
	});  
	tinymce.PluginManager.add('portfolio_carousel', tinymce.plugins.portfolio_carousel);  
})();

(function() {  
    tinymce.create('tinymce.plugins.price_table', {  
        init : function(ed, url) {  
            ed.addButton('price_table', {  
                title : 'Add a Price Table',  
                image : url+'/../images/shortcode_icons/price_table.png',  
                onclick : function() {  
                     ed.selection.setContent('[price_table columns="4"]<br /><br />[price_column title="Standard"][price_amount]$39[/price_amount][price_desc]Feature 1[/price_desc][price_desc]Feature 2[/price_desc][price_desc]Feature 3[/price_desc][price_footer][button href="" target="" css_classes="sm_button button_pale"]SignUp[/button][/price_footer][/price_column]<br /><br />[price_column title="Upgraded"][price_amount]$49[/price_amount][price_desc]Feature 1[/price_desc][price_desc]Feature 2[/price_desc][price_desc]Feature 3[/price_desc][price_footer][button href="" target="" css_classes="sm_button button_pale"]SignUp[/button][/price_footer][/price_column]<br /><br />[price_column type="featured" title="Premium"][price_amount]$69[/price_amount][price_desc]Feature 1[/price_desc][price_desc]Feature 2[/price_desc][price_desc]Feature 3[/price_desc][price_footer][button href="" target="" css_classes="sm_button button_hilite"]SignUp[/button][/price_footer][/price_column]<br /><br />[price_column type="" title="Professional"][price_amount]$99[/price_amount][price_desc]Feature 1[/price_desc][price_desc]Feature 2[/price_desc][price_desc]Feature 3[/price_desc][price_footer][button href="" target="" css_classes="sm_button button_pale"]SignUp[/button][/price_footer][/price_column]<br /><br />[/price_table]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('price_table', tinymce.plugins.price_table);  
})();

(function() {  
    tinymce.create('tinymce.plugins.icon', {  
        init : function(ed, url) {  
            ed.addButton('icon', {  
                title : 'Add an Icon',  
                image : url+'/../images/shortcode_icons/icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[icon type="i.g. icon-heart, icon-rocket"][/icon]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('icon', tinymce.plugins.icon);  
})();