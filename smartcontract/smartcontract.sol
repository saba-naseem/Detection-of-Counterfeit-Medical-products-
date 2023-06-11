pragma solidity ^0.6.0;

contract SupplyChain {
    
    event Added(uint256 index);
    
    struct State{
        string description;
        address person;
    }
    
    struct Product{
        address creator;
        string productName;
        uint256 productId;
        string productDescription;
        string date;
        uint256 totalStates;
        bool verify;
        mapping (uint256 => State) positions;
    }
    
    mapping(uint => Product) allProducts;
    uint256 items=0;
    
    function concat(string memory _a, string memory _b) pure public returns (string memory){
        bytes memory bytes_a = bytes(_a);
        bytes memory bytes_b = bytes(_b);
        string memory length_ab = new string(bytes_a.length + bytes_b.length);
        bytes memory bytes_c = bytes(length_ab);
        uint k = 0;
        for (uint i = 0; i < bytes_a.length; i++) bytes_c[k++] = bytes_a[i];
        for (uint i = 0; i < bytes_b.length; i++) bytes_c[k++] = bytes_b[i];
        return string(bytes_c);
    }
    
    function uintToString(uint256 value) public pure returns (string memory) {
        if (value == 0) {
            return "0";
        }
        
        uint256 temp = value;
        uint256 digits;
        
        while (temp != 0) {
            digits++;
            temp /= 10;
        }
        
        bytes memory buffer = new bytes(digits);
        
        while (value != 0) {
            digits -= 1;
            buffer[digits] = bytes1(uint8(48 + (value % 10)));
            value /= 10;
        }
        
        return string(buffer);
    }

    function newItem(string memory _text, string memory _desc, string memory _date) public returns (bool) {
        Product memory addNewItem = Product({creator: msg.sender, totalStates: 0,productName: _text, productId: items, date: _date, productDescription: _desc, verify: false});
        allProducts[items]=addNewItem;
        items = items+1;
        emit Added(items-1);
        return true;
    }
    
    function addState(uint _productId, string memory info) public returns (string memory) {
        require(_productId<=items);
        
        State memory newState = State({person: msg.sender, description: info});
        
        allProducts[_productId].positions[ allProducts[_productId].totalStates ]=newState;
        
        allProducts[_productId].totalStates = allProducts[_productId].totalStates +1;
        return info;
    }

    function totalitems() view  public returns (uint)
    {
        return items;
    }
    
    function searchProduct(uint _productId) view public returns (string memory) {

        require(_productId<=items);
        string memory output="Product Name: ";
        output=concat(output, allProducts[_productId].productName);
        output=concat(output, "<br>Product Description: ");
        output=concat(output, allProducts[_productId].productDescription);
        output=concat(output, "<br>Manufacture Date: ");
        output=concat(output, allProducts[_productId].date);
        
        for (uint256 j=0; j<allProducts[_productId].totalStates; j++){
            if(j==0){
                output=concat(output, "<br>Manufacture: ");
                output=concat(output, allProducts[_productId].positions[j].description);
            }
            else if(j==1)
            {
                output=concat(output, "<br>Distributer: ");
                output=concat(output, allProducts[_productId].positions[j].description);
            }
            else if(j==2)
            {
                output=concat(output, "<br>Pharmacy: ");
                output=concat(output, allProducts[_productId].positions[j].description);
            }
        }
        if(allProducts[_productId].totalStates>=3 && allProducts[_productId].verify==true)
        {
            output=concat(output, "<br>VERIFIED !!!");
        }
        else {
            output=concat(output, "<br>NOT VERIFIED !!!");
        }
        return output;
        
    }

    function verification(uint _productId) public returns (bool){
        require(_productId<items);        
        allProducts[_productId].verify=true;
        return true;
    }
    
    function allProduct() view public returns (string memory) {
        string memory output="<tr><th>Product Name</th><th>Product Details</th><th>Verification</th></tr>";
        for(uint256 i=0;i<items;i++)
        {
            string memory ii=uintToString(i);
            output=concat(output, "<tr><td>");
            output=concat(output, allProducts[i].productName);
            output=concat(output, "</td><td>Product Description: ");
            output=concat(output, allProducts[i].productDescription);
            output=concat(output, "<br>Manufacture Date: ");
            output=concat(output, allProducts[i].date);
            output=concat(output, "</td><td>");
            output=concat(output, "<div id='");
            output=concat(output, ii);
            output=concat(output, "' data-value='");
            output=concat(output, ii); 
            output=concat(output, "'>"); 
            if(allProducts[i].verify==true)
            {
                output=concat(output, "Verified</div></td></tr>");
            }
            else{
                output=concat(output, "<div style='text-decoration: underline; color: red;'>Verify</div></div></td></tr>");
            } 
        }
        return output;
    }
}