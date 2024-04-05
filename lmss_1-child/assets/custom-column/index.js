( function( blocks, element, blockEditor ) {
    var el = element.createElement;
    var RichText = blockEditor.RichText;

    blocks.registerBlockType( 'my-theme/custom-paragraph', {
        title: 'Custom Paragraph',
        category: 'text',
        icon: 'editor-paragraph',
        attributes: {
            content: {
                type: 'array',
                source: 'children',
                selector: 'p',
            },
            // Add other attributes here as needed
        },
        edit: function( props ) {
            var content = props.attributes.content;
            function onChangeContent( newContent ) {
                props.setAttributes( { content: newContent } );
            }

            return el(
                RichText,
                {
                    tagName: 'p',
                    // className: props.className,
                    onChange: onChangeContent,
                    value: content,
                }
            );
        },
        save: function( props ) {
            return el( RichText.Content, {
                tagName: 'p',
               // className: props.className,
                value: props.attributes.content
            } );
        },
    } );
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor );
