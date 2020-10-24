( function( blocks, editor, i18n, element ) {
	var el = element.createElement;
	var __ = i18n.__;

	blocks.registerBlockType( 'gpress-block/price', {
		title: i18n.__( 'Price list', 'gp-price-block' ),
		description: i18n.__( 'Easy way to bring price list in Gutenberg. Just click the button in the block manager and fill the inputs with product name and cost', 'gp-price-block' ),
		icon: {
			background: '#f7f6fb',
			foreground: '#333',
			src: 'editor-table',
			},
		category: 'common',

	attributes: {
		content: {
		type: 'string'
		},
		num: {
		type: 'string'
		}
	},

edit: function(props) {

	function updatecontent(event) {
	props.setAttributes({
		content: event.target.value
		})
	}

	function updatenum(event) {
	props.setAttributes({
		num: event.target.value
		})
	}

	return wp.element.createElement(
		"div",
		{className: 'gp-block-price' },

	wp.element.createElement(
		"input",
		{
		type: "text",
		placeholder: i18n.__( 'Product or service name', 'gp-price-block' ),
		value: props.attributes.content,
		onChange: updatecontent
		}
	),

	wp.element.createElement(
		"input",
		{
		type: "text",
		placeholder: i18n.__( 'Price', 'gp-price-block' ),
		value: props.attributes.num,
		onChange: updatenum
		}
		),
	)
},

	save: function(props) {
	return wp.element.createElement(
		"div",
		{
		className: "gpress-block-price",
		},
	
	wp.element.createElement(
		"p", {
		className: "gpress-block-name"
		},
		props.attributes.content
		),

		wp.element.createElement(
		"span", {
		className: "gp-block-num"
		},
		props.attributes.num
		)
	)
}

})


}(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element
) );
