const { registerBlockType } = wp.blocks;
const { createElement: el } = wp.element;
const { InnerBlocks, useBlockProps, InspectorControls } = wp.blockEditor;
const { PanelBody, TextControl } = wp.components;

registerBlockType('mytheme/featured-bootstrap-column', {
    title: 'Bootstrap Columns',
    icon: 'welcome-write-blog',
    category: 'layout',
    attributes: {
        colX: {
            type: 'string',
            default: '6',
        },
        colY: {
            type: 'string',
            default: '6',
        },
    },

    // Define the template including two columns with predefined widths
    getEditWrapperProps(attributes) {
        return { 'data-align': 'wide' };
    },

    edit: function (props) {
        var attributes = props.attributes;
        var setAttributes = props.setAttributes;

        const TEMPLATE = [
            ['core/column', {}, [
                [
                    'my-theme/custom-paragraph', {placeholder: 'Column 1...'}
                ],
            ]],
            ['core/column', {}, [
                [
                    'my-theme/custom-paragraph', {placeholder: 'Column 2...'}
                ],
            ]],
        ];
        

        const { clientId } = props;
        const innerBlockClientIds = wp.data.select('core/block-editor').getBlockOrder(clientId);

        const colXClass = `col-lg-${props.attributes.colX}`;
        const colYClass = `col-lg-${props.attributes.colY}`;

        // Assume the first two blocks are the columns we want to style
        const colXClientId = innerBlockClientIds[0];
        const colYClientId = innerBlockClientIds[1];

        // Apply the classes dynamically.
        wp.data.dispatch('core/block-editor').updateBlockAttributes(colXClientId, { className: colXClass });
        wp.data.dispatch('core/block-editor').updateBlockAttributes(colYClientId, { className: colYClass });

        // Add additional class for editing mode to style the block differently in the editor.
        const blockProps = useBlockProps({ className: 'custom-editor-shading' });


        // Ensure InnerBlocks render normally

        return [
            el(InspectorControls, null,
                el(PanelBody, { title: 'Column Settings', initialOpen: true },
                    el(TextControl, {
                        label: 'Column X Width',
                        value: attributes.colX,
                        onChange: function (newVal) {
                            setAttributes({ colX: newVal });
                        }
                    }),
                    el(TextControl, {
                        label: 'Column Y Width',
                        value: attributes.colY,
                        onChange: function (newVal) {
                            setAttributes({ colY: newVal });
                        }
                    })
                )
            ),
            el('div', useBlockProps(),
                el(InnerBlocks, {
                    template: TEMPLATE,
                    templateLock: false
                })
            )
        ];
    },




    save: function (props) {
        return el('div',
            useBlockProps.save({ className: 'row' }),
            // Dynamic InnerBlocks content will already have classes applied as needed.
            el(InnerBlocks.Content)
        );
    }

});

