describe('MKTime Testing', () => {
  it('visits the Create Item Page', () => {
    // Visit the MKTime Create Item page
    cy.visit('http://localhost/MKTime/create.php');
    // Check if the page contains the header "Add Item"
    cy.contains('h1', 'Add Item').should('be.visible');
    // Check if the form is present
    cy.get('form').should('exist');
    // Check if the form has an input field for the item name
    cy.get('input[name="item_name"]').should('exist');
    // Check if the navigation link for Read Items is present
    cy.get('a[href="read.php"]').should('exist').and('contain', 'Read');
  })
})