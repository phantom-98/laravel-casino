async function web3Login() {

  if (!window.ethereum) {
      alert('MetaMask not detected. Please install MetaMask first.');
      return;
  }

  const provider = new ethers.providers.Web3Provider(window.ethereum);
  
  
  let response = await fetch('/web3-login-message');
  const message = await response.text();

  await provider.send("eth_requestAccounts", []);
  const address = await provider.getSigner().getAddress();
  const signature = await provider.getSigner().signMessage(message);

  response = await fetch('/web3-login-verify', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({
          'address': address,
          'signature': signature,
          '_token': '{{ csrf_token() }}'
      })
  });
  const data = await response.text();

  console.log(",,,,,,,,,,,,,,,,,data", data);
}