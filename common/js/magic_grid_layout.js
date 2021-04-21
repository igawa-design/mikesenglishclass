
// Grid rayout //////////////////////////////////////////////////////

let magicGrid = new MagicGrid({
  container: ".container", // Required. Can be a class, id, or an HTMLElement.
  static: true, // Required for static content.
  animate: true, // Optional.
  gutter: 0, // Optional. Space between items. Default: 25(px). *change 25 to 0, applying a css.
});

magicGrid.listen();
